<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\WebhookController;
use App\Models\MonthlyPack;
use App\Models\UserPackageStatus;

class BillingController extends Controller
{
    public function index()
    {
        if (session()->get('authUser')->user_type != 'main') {
            abort(403,'You are not authorized to access that page');
            die();
        }

        $data = array(
            'title' => 'Plans & Billing',
            'user_package' => session()->get('UserPackages'),
            'packageData' => session()->get('PackageData'),
        );

        return view('front.billing.index')->with($data);
    }

    public function upgrade_plan(Request $request) {

        $webhookController = new WebhookController;

        $package = Package::where('payproglobal_product_id', $request->product_id);


        if ($package->doesntExist()) {
            return redirect()->back()->with('error-msg','Package Not Found');
        }

        $package = $package->latest()->first();

        $authUser = session()->get('authUser');

        $userPackage = UserPackage::with('package')->where('user_id',$authUser->id)->latest()->first();

        $subsData = json_decode($userPackage->data);

        $chargeAmount = $package->price - $subsData->SUBSCRIPTION_NEXT_CHARGE_AMOUNT;


        // Charging the remaining amount for the upgrade of the plan

        $refChargedata = [
            "referencedOrderId" => $subsData->ORDER_ID, // The order ID that will be used as a reference to identify customer's billing and payment details.
            "productId" => $request->product_id, // A product ID to use for the charge. No new subscription will be created even if the product's charging type is a subscription.
            "priceCurrencyCode" => $subsData->SUBSCRIPTION_NEXT_CHARGE_CURRENCY_CODE, // The currency code that will be used to charge the customer. The list of available currency codes can be found here
            "priceValue" => $chargeAmount, // The price amount that will be charged. It will be ignored if OrderItemDetails is passed.
            "referenceChargeName" => $package->title, // The name that will be used as the order item name in the invoice, the customer confirmation email and the reports.
            "sku" => $package->plan_code, // The internal stock unity (SKU) number if needed.
            "customFields" => [
                "type" => "upgrade",
                "subscription_id" => $userPackage->subscription_id,
            ], // Any custom data to associate with the order charge.
            "orderItemDetails" => [
                [
                    "orderItemName" => $package->title,
                    "unitPriceValue" => $chargeAmount,
                    "quantity" => 1
                ]
            ], // Pass orderItemDetails to define names and prices for several products.

            "convertToReferenceCurrency"=> true,
            "vendorAccountId"=> 165209,
            "apiSecretKey"=> "ddb1040f-7b68-4805-9266-ac358f3ab645"
        ];

        $referenceCharge = $webhookController->referenceCharge($refChargedata);

        if (isset($referenceCharge->isSuccess) && $referenceCharge->isSuccess == false) {

            $webhookController->sendErrorDetailsEmail(json_encode($referenceCharge),$request->url(),'Error while Upgrading Plan');

            return redirect()->back()->with('error-msg','Something Went Wrong Try Again Later');
        }

        // changing Product In Subscription

        $changeProductdata = [
            'productId' => $request->product_id, // The ID of the new product that will be updated in the subscription.
            'quantity' => 1, // The new product quantity you want to apply.
            "sendCustomerNotification" => true,
            "subscriptionId" => $userPackage->subscription_id, // The subscription ID that needs to be updated.
            "vendorAccountId" => 165209,
            "apiSecretKey" => "ddb1040f-7b68-4805-9266-ac358f3ab645",
        ];

        $changeProduct = $webhookController->changeProduct($changeProductdata);

        if (isset($changeProduct->isSuccess) && $changeProduct->isSuccess == false) {

            $webhookController->sendErrorDetailsEmail(json_encode($changeProduct),$request->url(),'Error while change Product');

            return redirect()->back()->with('error-msg','Something Went Wrong Try Again Later');
        }

        $month_packages_sku = ['P1', 'P20', 'P50', 'P200', 'P500'];

        $yearly_sku = ['P20-year', 'P50-year', 'P200-year', 'P500-year'];

        // User upgrade from current monthly package to another upper monthly package

        if (in_array($package->plan_code,$month_packages_sku) && in_array($userPackage->package->plan_code,$month_packages_sku)) {
            $userPackage->package_id = $package->id;
            $userPackage->words = $package->words;
            $userPackage->research_limit = $package->research_limit;
            $userPackage->workspace_users = $package->workspace_users;
            $userPackage->save();

            return redirect()->route('user.billing.all')->with('success-msg','Subscription Upgraded Successfully');
        }

        // User upgrade from current monthly package to another yearly package

        if (in_array($package->plan_code,$yearly_sku) && in_array($userPackage->package->plan_code,$month_packages_sku)) {

            // updating the Next Payment Date

            $newNextPaymentDate = now()->diffInDays($userPackage->start_date);

            $newNextPaymentDate = now()->subDays($newNextPaymentDate)->addYears(1);

            $changeNextPaymentDateData = [
                'newNextPaymentDate' => $newNextPaymentDate->format('Y-m-d h:i:s'), // The new subscription next charge date you want to apply..
                'shiftPaymentSchedule' => true, // Possible values are true or false. If true, it shifts all next subscription payments according to the updated next payment date. If false, it changes only the upcoming payment date without shifting all further subscription charge dates.
                // "newSubscriptionName" => '', // The new name for a subscription that you want to apply.
                "sendCustomerNotification" => true,
                "subscriptionId" => $userPackage->subscription_id,
                "vendorAccountId" => 165209,
                "apiSecretKey" => "ddb1040f-7b68-4805-9266-ac358f3ab645",
            ];

            $changeNextPaymentDate = $webhookController->changeNextPaymentDate($changeNextPaymentDateData);

            $diff_in_days = now()->diffInDays($userPackage->end_date);

            $userPackage->package_id = $package->id;
            $userPackage->words = $package->words;
            $userPackage->research_limit = $package->research_limit;
            $userPackage->workspace_users = $package->workspace_users;
            $userPackage->end_date = $newNextPaymentDate->format('Y-m-d');
            $userPackage->save();

            $start_date = date('Y-m-d');
            $monthly_packs = [];

            for ($i = 1; $i <= 12; $i++) {
                if ($i == 1) {
                    $end_date = date('Y-m-d', strtotime('+'.$diff_in_days.' days'));
                    $monthly_packs[$i] = [
                        'user_id' => $userPackage->user_id,
                        'package_id' => $userPackage->package_id,
                        'user_package_id' => $userPackage->id,
                        'words' => $userPackage->words,
                        'research_limit' => $userPackage->research_limit,
                        'workspace_users' => $userPackage->workspace_users,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                } else {
                    $start_date = $monthly_packs[($i - 1)]['end_date'];
                    $end_date = date('Y-m-d', strtotime('+30 days', strtotime($start_date)));
                    $monthly_packs[$i] = [
                        'user_id' => $userPackage->user_id,
                        'package_id' => $userPackage->package_id,
                        'user_package_id' => $userPackage->id,
                        'words' => $userPackage->words,
                        'research_limit' => $userPackage->research_limit,
                        'workspace_users' => $userPackage->workspace_users,
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

            return redirect()->route('user.billing.all')->with('success-msg','Subscription Upgraded Successfully');
        }

        // User upgrade from current yearly package to another upper yearly package
        if (in_array($package->plan_code,$yearly_sku) && in_array($userPackage->package->plan_code,$yearly_sku)) {
            $userPackage->package_id = $package->id;
            $userPackage->words = $package->words;
            $userPackage->research_limit = $package->research_limit;
            $userPackage->workspace_users = $package->workspace_users;
            $userPackage->save();

            $userPackage->monthly_packs()->update([
                'package_id' => $userPackage->package_id,
                'user_package_id' => $userPackage->id,
                'words' => $userPackage->words,
                'research_limit' => $userPackage->research_limit,
                'workspace_users' => $userPackage->workspace_users,
            ]);

            return redirect()->route('user.billing.all')->with('success-msg','Subscription Upgraded Successfully');
        }

        return redirect()->route('user.billing.all')->with('error-msg','something went wrong');

    }

    public function downgrade_plan(Request $request) {

        $webhookController = new WebhookController;

        $package = Package::where('payproglobal_product_id', $request->product_id);


        if ($package->doesntExist()) {
            return redirect()->back()->with('error-msg','Package Not Found');
        }

        $package = $package->latest()->first();

        $authUser = session()->get('authUser');

        $userPackage = UserPackage::with('package')->where('user_id',$authUser->id)->latest()->first();

        $subsData = json_decode($userPackage->data);

        // changing Product In Subscription

        $changeProductdata = [
            'productId' => $request->product_id, // The ID of the new product that will be updated in the subscription.
            'quantity' => 1, // The new product quantity you want to apply.
            "sendCustomerNotification" => true,
            "subscriptionId" => $userPackage->subscription_id, // The subscription ID that needs to be updated.
            "vendorAccountId" => 165209,
            "apiSecretKey" => "ddb1040f-7b68-4805-9266-ac358f3ab645",
        ];

        $changeProduct = $webhookController->changeProduct($changeProductdata);

        if (isset($changeProduct->isSuccess) && $changeProduct->isSuccess == false) {

            $webhookController->sendErrorDetailsEmail(json_encode($changeProduct),$request->url(),'Error while change Product');

            return redirect()->back()->with('error-msg','Something Went Wrong Try Again Later');
        }

        $month_packages_sku = ['P1', 'P20', 'P50', 'P200', 'P500'];

        $yearly_sku = ['P20-year', 'P50-year', 'P200-year', 'P500-year'];

        // User downgrade from current monthly package to another monthly package
        if (in_array($package->plan_code,$month_packages_sku) && in_array($userPackage->package->plan_code,$month_packages_sku)) {

            $subscriptionStatus = new UserPackageStatus();
            $subscriptionStatus->user_id = $userPackage->user_id;
            $subscriptionStatus->user_package_id = $userPackage->id;
            $subscriptionStatus->old_package_id = $userPackage->package_id;
            $subscriptionStatus->new_package_id = $package->id;
            $subscriptionStatus->subscription_id = $userPackage->subscription_id;
            $subscriptionStatus->type = 'downgrade';
            $subscriptionStatus->save();

            // $userPackage->package_id = $package->id;
            // $userPackage->words = $package->words;
            // $userPackage->research_limit = $package->research_limit;
            // $userPackage->workspace_users = $package->workspace_users;
            // $userPackage->save();

            return redirect()->route('user.billing.all')->with('success-msg','Subscription downgraded Successfully');
        }

        // User downgrade from current yearly package to another yearly package
        if (in_array($package->plan_code,$yearly_sku) && in_array($userPackage->package->plan_code,$yearly_sku)) {

            $subscriptionStatus = new UserPackageStatus();
            $subscriptionStatus->user_id = $userPackage->user_id;
            $subscriptionStatus->user_package_id = $userPackage->id;
            $subscriptionStatus->old_package_id = $userPackage->package_id;
            $subscriptionStatus->new_package_id = $package->id;
            $subscriptionStatus->subscription_id = $userPackage->subscription_id;
            $subscriptionStatus->type = 'downgrade';
            $subscriptionStatus->save();

            // $userPackage->package_id = $package->id;
            // $userPackage->words = $package->words;
            // $userPackage->research_limit = $package->research_limit;
            // $userPackage->workspace_users = $package->workspace_users;
            // $userPackage->save();

            // $userPackage->monthly_packs()->update([
            //     'package_id' => $userPackage->package_id,
            //     'user_package_id' => $userPackage->id,
            //     'words' => $userPackage->words,
            //     'research_limit' => $userPackage->research_limit,
            //     'workspace_users' => $userPackage->workspace_users,
            // ]);

            return redirect()->route('user.billing.all')->with('success-msg','Subscription downgraded Successfully');
        }

        if (in_array($package->plan_code,$month_packages_sku) && in_array($userPackage->package->plan_code,$yearly_sku)) {

            // updating the Next Payment Date

            $newNextPaymentDate = now()->diffInDays($userPackage->start_date);

            $newNextPaymentDate = now()->subDays($newNextPaymentDate)->addYears(1);

            $changeNextPaymentDateData = [
                'newNextPaymentDate' => $newNextPaymentDate->format('Y-m-d h:i:s'), // The new subscription next charge date you want to apply..
                'shiftPaymentSchedule' => false, // Possible values are true or false. If true, it shifts all next subscription payments according to the updated next payment date. If false, it changes only the upcoming payment date without shifting all further subscription charge dates.
                // "newSubscriptionName" => '', // The new name for a subscription that you want to apply.
                "sendCustomerNotification" => true,
                "subscriptionId" => $userPackage->subscription_id,
                "vendorAccountId" => 165209,
                "apiSecretKey" => "ddb1040f-7b68-4805-9266-ac358f3ab645",
            ];

            $changeNextPaymentDate = $webhookController->changeNextPaymentDate($changeNextPaymentDateData);

            $subscriptionStatus = new UserPackageStatus();
            $subscriptionStatus->user_id = $userPackage->user_id;
            $subscriptionStatus->user_package_id = $userPackage->id;
            $subscriptionStatus->old_package_id = $userPackage->package_id;
            $subscriptionStatus->new_package_id = $package->id;
            $subscriptionStatus->subscription_id = $userPackage->subscription_id;
            $subscriptionStatus->type = 'downgrade';
            $subscriptionStatus->save();

            // $userPackage->package_id = $package->id;
            // $userPackage->words = $package->words;
            // $userPackage->research_limit = $package->research_limit;
            // $userPackage->workspace_users = $package->workspace_users;
            // $userPackage->save();


            return redirect()->route('user.billing.all')->with('success-msg','Subscription downgraded Successfully');
        }

        return redirect()->route('user.billing.all')->with('error-msg','something went wrong');

    }
}
