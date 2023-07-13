<?php

namespace App\Http\Controllers;

use App\Models\MonthlyPack;
use App\Models\Package;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Events\PaymentSucceeded;
use Laravel\Paddle\Events\SubscriptionCancelled;
use Laravel\Paddle\Events\SubscriptionCreated;
use Laravel\Paddle\Events\SubscriptionPaymentFailed;
use Laravel\Paddle\Events\SubscriptionPaymentSucceeded;
use Laravel\Paddle\Events\SubscriptionUpdated;
use Laravel\Paddle\Events\WebhookHandled;
use Laravel\Paddle\Events\WebhookReceived;
use Laravel\Paddle\Exceptions\InvalidPassthroughPayload;
use Laravel\Paddle\Http\Middleware\VerifyWebhookSignature;
use Laravel\Paddle\Subscription;
use Symfony\Component\HttpFoundation\Response;

class PaddleWebhookController extends Controller
{
    /**
     * Create a new WebhookController instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (config('cashier.public_key')) {
            $this->middleware(VerifyWebhookSignature::class);
        }
    }

    /**
     * Handle a Paddle webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke(Request $request)
    {
        $payload = $request->all();


        if (!isset($payload['alert_name'])) {
            return new Response();
        }

        $method = 'handle' . Str::studly($payload['alert_name']);


        WebhookReceived::dispatch($payload);

        if (method_exists($this, $method)) {
            try {
                $this->{$method}($payload);
            } catch (InvalidPassthroughPayload $e) {
                return new Response('Webhook Skipped');
            }

            WebhookHandled::dispatch($payload);

            return new Response('Webhook Handled');
        }

        return new Response();
    }

    /**
     * Handle one-time payment succeeded.
     *
     * @param  array  $payload
     * @return void
     */
    protected function handlePaymentSucceeded(array $payload)
    {
        if ($this->receiptExists($payload['order_id'])) {
            return;
        }

        $customer = $this->findOrCreateCustomer($payload['passthrough']);

        $receipt = $customer->receipts()->create([
            'checkout_id' => $payload['checkout_id'],
            'order_id' => $payload['order_id'],
            'amount' => $payload['sale_gross'],
            'tax' => $payload['payment_tax'],
            'currency' => $payload['currency'],
            'quantity' => (int) $payload['quantity'],
            'receipt_url' => $payload['receipt_url'],
            'paid_at' => Carbon::createFromFormat('Y-m-d H:i:s', $payload['event_time'], 'UTC'),
        ]);

        PaymentSucceeded::dispatch($customer, $receipt, $payload);
    }

    /**
     * Handle subscription payment succeeded.
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleSubscriptionPaymentSucceeded(array $payload)
    {
        if ($this->receiptExists($payload['order_id'])) {
            return;
        }

        if ($subscription = $this->findSubscription($payload['subscription_id'])) {
            $billable = $subscription->billable;
        } else {
            $billable = $this->findOrCreateCustomer($payload['passthrough']);
        }

        $receipt = $billable->receipts()->create([
            'paddle_subscription_id' => $payload['subscription_id'],
            'checkout_id' => $payload['checkout_id'],
            'order_id' => $payload['order_id'],
            'amount' => $payload['sale_gross'],
            'tax' => $payload['payment_tax'],
            'currency' => $payload['currency'],
            'quantity' => (int) $payload['quantity'],
            'receipt_url' => $payload['receipt_url'],
            'paid_at' => Carbon::createFromFormat('Y-m-d H:i:s', $payload['event_time'], 'UTC'),
        ]);

        $user = User::find($billable->id);

        $this->createUserPackage($user, $payload);

        SubscriptionPaymentSucceeded::dispatch($billable, $receipt, $payload);
    }

    /**
     * Handle subscription payment failed.
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleSubscriptionPaymentFailed(array $payload)
    {
        if ($subscription = $this->findSubscription($payload['subscription_id'])) {
            SubscriptionPaymentFailed::dispatch($subscription->billable, $payload);
        }
    }

    /**
     * Handle subscription created.
     *
     * @param  array  $payload
     * @return void
     *
     * @throws \Laravel\Paddle\Exceptions\InvalidPassthroughPayload
     */
    protected function handleSubscriptionCreated(array $payload)
    {
        $passthrough = isset($payload['passthrough']) ? json_decode($payload['passthrough'], true) : null;

        if (!isset($passthrough) || !is_array($passthrough) || !isset($passthrough['subscription_name'])) {
            throw new InvalidPassthroughPayload;
        }

        $customer = $this->findOrCreateCustomer($payload['passthrough']);

        $trialEndsAt = $payload['status'] === Subscription::STATUS_TRIALING
            ? Carbon::createFromFormat('Y-m-d', $payload['next_bill_date'], 'UTC')->startOfDay()
            : null;

        $subscription = $customer->subscriptions()->create([
            'name' => $passthrough['subscription_name'],
            'paddle_id' => $payload['subscription_id'],
            'paddle_plan' => $payload['subscription_plan_id'],
            'paddle_status' => $payload['status'],
            'quantity' => $payload['quantity'],
            'trial_ends_at' => $trialEndsAt,
        ]);

        SubscriptionCreated::dispatch($customer, $subscription, $payload);
    }

    /**
     * Handle subscription updated.
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleSubscriptionUpdated(array $payload)
    {
        if (!$subscription = $this->findSubscription($payload['subscription_id'])) {
            return;
        }

        // Plan...
        if (isset($payload['subscription_plan_id'])) {
            $subscription->paddle_plan = $payload['subscription_plan_id'];
        }

        // Status...
        if (isset($payload['status'])) {
            $subscription->paddle_status = $payload['status'];
        }

        // Quantity...
        if (isset($payload['new_quantity'])) {
            $subscription->quantity = $payload['new_quantity'];
        }

        // Paused...
        if (isset($payload['paused_from'])) {
            $subscription->paused_from = Carbon::createFromFormat('Y-m-d H:i:s', $payload['paused_from'], 'UTC');
        } else {
            $subscription->paused_from = null;
        }

        $subscription->save();

        SubscriptionUpdated::dispatch($subscription, $payload);
    }

    /**
     * Handle subscription cancelled.
     *
     * @param  array  $payload
     * @return void
     */
    protected function handleSubscriptionCancelled(array $payload)
    {
        if (!$subscription = $this->findSubscription($payload['subscription_id'])) {
            return;
        }

        // Cancellation date...
        if (is_null($subscription->ends_at)) {
            $subscription->ends_at = $subscription->onTrial()
                ? $subscription->trial_ends_at
                : Carbon::createFromFormat('Y-m-d', $payload['cancellation_effective_date'], 'UTC')->startOfDay();
        }

        // Status...
        if (isset($payload['status'])) {
            $subscription->paddle_status = $payload['status'];
        }

        $subscription->paused_from = null;

        $subscription->save();

        SubscriptionCancelled::dispatch($subscription, $payload);
    }

    /**
     * Find or create a customer based on the passthrough values and return the billable model.
     *
     * @param  string  $passthrough
     * @return \Laravel\Paddle\Billable
     *
     * @throws \Laravel\Paddle\Exceptions\InvalidPassthroughPayload
     */
    protected function findOrCreateCustomer(string $passthrough)
    {
        $passthrough = json_decode($passthrough, true);

        if (!is_array($passthrough) || !isset($passthrough['billable_id'], $passthrough['billable_type'])) {
            throw new InvalidPassthroughPayload;
        }

        return Cashier::$customerModel::firstOrCreate([
            'billable_id' => $passthrough['billable_id'],
            'billable_type' => $passthrough['billable_type'],
        ])->billable;
    }

    /**
     * Find the first subscription matching a Paddle subscription id.
     *
     * @param  string  $subscriptionId
     * @return \Laravel\Paddle\Subscription|null
     */
    protected function findSubscription(string $subscriptionId)
    {
        return Cashier::$subscriptionModel::firstWhere('paddle_id', $subscriptionId);
    }

    /**
     * Determine if a receipt with a given Order ID already exists.
     *
     * @param  string  $orderId
     * @return bool
     */
    protected function receiptExists(string $orderId)
    {
        return Cashier::$receiptModel::where('order_id', $orderId)->count() > 0;
    }

    // protected function createUserPackage($user, $subscription){
    //     DB::transaction(function()use($user,$subscription) {
    //         $package = Package::where('paddle_plan_id',$subscription->paddle_plan)->latest()->first();

    //         $user_package = new UserPackage();
    //         $user_package->user_id = $user->id;
    //         $user_package->package_id = $package->id;
    //         $user_package->subscription_id = $subscription->paddle_id;
    //         $user_package->words = $package->words;
    //         $user_package->research_limit = $package->research_limit;
    //         $user_package->workspace_users = $package->workspace_users;
    //         $user_package->start_date = now()->format('Y-m-d');
    //         $user_package->end_date = $subscription->nextPayment()->date()->format('Y-m-d');
    //         $user_package->save();
    //     });
    // }

    protected function createUserPackage($user, $payload)
    {
        DB::transaction(function () use ($user, $payload) {
            $package = Package::where('paddle_plan_id', $payload['subscription_plan_id'])->latest()->first();

            $yearly_sku = ['P20-year', 'P50-year', 'P200-year', 'P500-year'];

            $user_package = new UserPackage();
            $user_package->user_id = $user->id;
            $user_package->package_id = $package->id;
            $user_package->subscription_id = $payload['subscription_id'];
            $user_package->words = $package->words;
            $user_package->research_limit = $package->research_limit;
            $user_package->workspace_users = $package->workspace_users;
            $user_package->start_date = now()->format('Y-m-d');
            $user_package->end_date = $payload['next_bill_date'];
            $user_package->save();

            if (in_array($package->plan_code, $yearly_sku)) {
                $start_date = date('Y-m-d');
                $monthly_packs = [];

                for ($i = 1; $i <= 12; $i++) {
                    if ($i == 1) {
                        $end_date = date('Y-m-d', strtotime('+30 days'));
                        $monthly_packs[$i] = [
                            'user_id' => $user_package->user_id,
                            'package_id' => $user_package->package_id,
                            'user_package_id' => $user_package->id,
                            'words' => $user_package->words,
                            'research_limit' => $user_package->research_limit,
                            'workspace_users' => $user_package->workspace_users,
                            'start_date' => $start_date,
                            'end_date' => $end_date,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    } else {
                        $start_date = $monthly_packs[($i - 1)]['end_date'];
                        $end_date = date('Y-m-d', strtotime('+30 days', strtotime($start_date)));
                        $monthly_packs[$i] = [
                            'user_id' => $user_package->user_id,
                            'package_id' => $user_package->package_id,
                            'user_package_id' => $user_package->id,
                            'words' => $user_package->words,
                            'research_limit' => $user_package->research_limit,
                            'workspace_users' => $user_package->workspace_users,
                            'start_date' => $start_date,
                            'end_date' => $end_date,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }

                if (!empty($monthly_packs) && count($monthly_packs) > 0) {
                    MonthlyPack::insert($monthly_packs);
                }
            }
        });
    }
}
