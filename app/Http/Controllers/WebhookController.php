<?php

namespace App\Http\Controllers;

use App\Mail\WebhookErrors;
use App\Models\MonthlyPack;
use App\Models\Package;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\WebhookLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WebhookController extends Controller
{
    public function payment_handler(Request $request)
    {
        // dd($request->all());
        // Log::info('webhook',$request->all());
        $webhookLog = new WebhookLog();
        $webhookLog->data = json_encode($request->all());
        $webhookLog->save();


        // $webhook_data =  json_decode($webhookLog->find(13)->data);

        $webhook_data =  json_decode($webhookLog->data);
        $custom_string = explode('&',$webhook_data->CHECKOUT_QUERY_STRING);


        if(isset($custom_string[4])){
            $userUniqueId = str_replace('ORDER_CUSTOM_FIELDS=x-user%3d','',$custom_string[4]);
        }

        $IPNTypes = ['OrderCharged', 'SubscriptionChargeSucceed', 'SubscriptionChargeFailed', 'SubscriptionSuspended', 'SubscriptionRenewed', 'SubscriptionTerminated', 'SubscriptionFinished'];

        $webCustomerEmail = null;

        // if (isset($webhook_data->ORDER_CUSTOM_FIELDS) && !empty($webhook_data->ORDER_CUSTOM_FIELDS) && count($webhook_data->ORDER_CUSTOM_FIELDS) > 0) {
        //     // $custmer_email = explode($webhook_data->ORDER_CUSTOM_FIELDS);
        //     if (is_array($webhook_data->ORDER_CUSTOM_FIELDS)) {
        //         if ($webhook_data->ORDER_CUSTOM_FIELDS[0]->customFieldKey == 'x-user') {
        //             $webCustomerEmail = $webhook_data->ORDER_CUSTOM_FIELDS[0]->customFieldValue;
        //         }
        //     } else {
        //         if (isset($webhook_data->LICENSED_TO_EMAIL) && !empty($webhook_data->LICENSED_TO_EMAIL)) {
        //             $webCustomerEmail = $webhook_data->LICENSED_TO_EMAIL;
        //         } else {
        //             $webCustomerEmail = $webhook_data->CUSTOMER_EMAIL;
        //         }
        //     }
        // } else {
        //     if (isset($webhook_data->LICENSED_TO_EMAIL) && !empty($webhook_data->LICENSED_TO_EMAIL)) {
        //         $webCustomerEmail = $webhook_data->LICENSED_TO_EMAIL;
        //     } else {
        //         $webCustomerEmail = $webhook_data->CUSTOMER_EMAIL;
        //     }
        // }

        // if (isset($webhook_data->LICENSED_TO_EMAIL) && !empty($webhook_data->LICENSED_TO_EMAIL)) {
        //     $webCustomerEmail = $webhook_data->LICENSED_TO_EMAIL;
        // } else {
        //     $webCustomerEmail = $webhook_data->CUSTOMER_EMAIL;
        // }

        if (isset($userUniqueId) && !empty($userUniqueId)) {
            $findUser = User::where('unique_id',$userUniqueId);
            if($findUser->count() > 0){
                $webCustomerEmail = $findUser->latest()->first()->email;
            }else{
                if (isset($webhook_data->LICENSED_TO_EMAIL) && !empty($webhook_data->LICENSED_TO_EMAIL)) {
                    $webCustomerEmail = $webhook_data->LICENSED_TO_EMAIL;
                } else {
                    $webCustomerEmail = $webhook_data->CUSTOMER_EMAIL;
                }
            }
        }
        else{
            if (isset($webhook_data->LICENSED_TO_EMAIL) && !empty($webhook_data->LICENSED_TO_EMAIL)) {
                $webCustomerEmail = $webhook_data->LICENSED_TO_EMAIL;
            } else {
                $webCustomerEmail = $webhook_data->CUSTOMER_EMAIL;
            }
        }


        if ($webhook_data->ORDER_STATUS == "Processed" && $webhook_data->SUBSCRIPTION_STATUS_NAME == "Active" && $webhook_data->IPN_TYPE_NAME == "OrderCharged") {

            $this->newSubscription($webhook_data, $request->url(), $webCustomerEmail);
        } elseif ($webhook_data->ORDER_STATUS == "Processed" && $webhook_data->SUBSCRIPTION_STATUS_NAME == "Active" && $webhook_data->IPN_TYPE_NAME == "SubscriptionChargeSucceed") {

            $this->renewSubscription($webhook_data, $request->url(), $webCustomerEmail);
        }

        if ($webhook_data->IPN_TYPE_NAME == "SubscriptionSuspended") {
            $this->suspendedSubscription($webhook_data, $request->url());
        }
    }


    public function newSubscription($data, $PageUrl, $email)
    {
        try {
            $CheckEmail = User::where('email', $email)->get();



            if (isset($CheckEmail[0]) && !empty($CheckEmail[0])) {


                if (!empty($data->ORDER_ITEM_SKU)) {
                    $packageDetails = Package::where('plan_code', $data->ORDER_ITEM_SKU)->get();
                    $MaxWords = $packageDetails[0]->words;
                    $packageId = $packageDetails[0]->id;
                    $researchLimit = $packageDetails[0]->research_limit;
                    $workspaceUsers = $packageDetails[0]->workspace_users;
                } else {
                    $MaxWords = 0;
                    $packageId = 1;
                    $researchLimit = 2;
                    $workspaceUsers = 0;
                }

                // checking old subscriptions
                $check_old_subs = UserPackage::with('package')->where('user_id',$CheckEmail[0]->id)->latest()->get();
                $packages_sku = ['P1','P20','P50','P200','P500','P20-year','P50-year','P200-year','P500-year'];

                if (isset($check_old_subs[0]) && !empty($check_old_subs[0]) && in_array($check_old_subs[0]->package->plan_code,$packages_sku)) {

                    $this->suspendSubscription($check_old_subs[0]->subscription_id);
                }


                if (empty($CheckEmail[0]->customer_id)) {

                    User::where('email',$email)->update([
                        'customer_id' => $data->CUSTOMER_ID,
                        'has_package' => $packageId,
                    ]);
                }

                $user_package = new UserPackage();
                $user_package->user_id = $CheckEmail[0]->id;
                $user_package->package_id = $packageId;
                $user_package->subscription_id = $data->SUBSCRIPTION_ID;
                $user_package->words = $MaxWords;
                $user_package->research_limit = $researchLimit;
                $user_package->workspace_users = $workspaceUsers;
                $user_package->data = json_encode($data);
                $user_package->start_date = now()->format('Y-m-d');
                $user_package->end_date = date('Y-m-d', strtotime($data->SUBSCRIPTION_NEXT_CHARGE_DATE));
                $user_package->save();

                $yearly_sku = ['P20-year','P50-year','P200-year','P500-year'];

                if (in_array($user_package->package->plan_code,$yearly_sku)) {

                    $start_date = date('Y-m-d');
                    $monthly_packs = [];

                    for ($i=1; $i <= 12 ; $i++) {
                        if ($i == 1) {
                            $end_date = date('Y-m-d',strtotime('+30 days'));
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
                        }else{
                            $start_date = $monthly_packs[($i-1)]['end_date'];
                            $end_date = date('Y-m-d',strtotime('+30 days',strtotime($start_date)));
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
            }

            Log::info('new subscription User Not Found With Email');
        } catch (\Exception $e) {
            $currenturl = $PageUrl;
            $code = $e->getCode();
            $message = $e->getMessage();
            $this->sendErrorDetailsEmail($e, $currenturl, $message);
        }
    }

    public function renewSubscription($data, $PageUrl, $email)
    {
        try {
            $CheckEmail = User::where('email', $email)->where('customer_id', $data->CUSTOMER_ID)->get();

            if (isset($CheckEmail[0]) && !empty($CheckEmail[0])) {

                if (!empty($data->ORDER_ITEM_SKU)) {
                    $packageDetails = Package::where('plan_code', $data->ORDER_ITEM_SKU)->get();
                    $MaxWords = $packageDetails[0]->words;
                    $packageId = $packageDetails[0]->id;
                } else {
                    $MaxWords = 0;
                    $packageId = 1;
                }

                // $old_subscriptions = UserPackage::where('user_id', $CheckEmail[0]->id)->delete();

                $user_package = new UserPackage();
                $user_package->user_id = $CheckEmail[0]->id;
                $user_package->package_id = $packageId;
                $user_package->subscription_id = $data->SUBSCRIPTION_ID;
                $user_package->words = $MaxWords;
                $user_package->research_limit = @$packageDetails->research_limit;
                $user_package->workspace_users = @$packageDetails->workspace_users;
                $user_package->data = json_encode($data);
                $user_package->start_date = now()->format('Y-m-d');
                $user_package->end_date = date('Y-m-d', strtotime($data->SUBSCRIPTION_NEXT_CHARGE_DATE));
                $user_package->save();


                $yearly_sku = ['P20-year','P50-year','P200-year','P500-year'];

                if (in_array($user_package->package->plan_code,$yearly_sku)) {

                    $start_date = date('Y-m-d');
                    $monthly_packs = [];

                    for ($i=1; $i <= 12 ; $i++) {
                        if ($i == 1) {
                            $end_date = date('Y-m-d',strtotime('+30 days'));
                            $monthly_packs[$i] = [
                                'user_id' => $user_package->user_id,
                                'user_package_id' => $user_package->id,
                                'words' => $user_package->words,
                                'research_limit' => $user_package->research_limit,
                                'workspace_users' => $user_package->workspace_users,
                                'start_date' => $start_date,
                                'end_date' => $end_date,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }else{
                            $start_date = $monthly_packs[($i-1)]['end_date'];
                            $end_date = date('Y-m-d',strtotime('+30 days',strtotime($start_date)));
                            $monthly_packs[$i] = [
                                'user_id' => $user_package->user_id,
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
            }

            Log::info('Renew subscription User Not Found With Email and Customer id');
        } catch (\Exception $e) {
            $currenturl = $PageUrl;
            $code = $e->getCode();
            $message = $e->getMessage();
            $this->sendErrorDetailsEmail($e, $currenturl, $message);
        }
    }

    public function suspendedSubscription($data, $PageUrl)
    {
        try {
            $CheckCustomer = User::where('customer_id', $data->CUSTOMER_ID)->get();

            if (isset($CheckCustomer[0]) && !empty($CheckCustomer[0])) {

                $user_package = UserPackage::where(['user_id' => $CheckCustomer[0]->id, 'subscription_id' => $data->SUBSCRIPTION_ID])->get();

                if (isset($user_package[0]) && !empty($user_package[0])) {
                    $subscription = UserPackage::where(['user_id' => $CheckCustomer[0]->id, 'subscription_id' => $data->SUBSCRIPTION_ID])->latest()->first();
                    $subscription->status = 0;
                    $subscription->save();
                }
            }

            Log::info('suspended subscription User Not Found With Customer id');
        } catch (\Exception $e) {
            $currenturl = $PageUrl;
            $code = $e->getCode();
            $message = $e->getMessage();
            $this->sendErrorDetailsEmail($e, $currenturl, $message);
        }
    }

    public function sendErrorDetailsEmail($execprionDetails, $PageUrl, $message)
    {

        $details = [
            'title' => 'easyseo.io - Webhook Error (New Subscription)',
            'body' => "<p style='font-size:16px;font-weight:600;text-align:center;'> Error occured While fetching data of new subscription via Webhook. Here are the details of Error: <br><br>
			<strong>Message : </strong> " . $message . "<br>" . $execprionDetails . " <br> <a href='" . $PageUrl . "'>" . $PageUrl . "</a></p></p>",
        ];
        Mail::to('m.daniyal.khan399@gmail.com')->send(new WebhookErrors($details));
    }

    public function suspendSubscription($subscriptionId)
    {
        // for suspend subscription
        // $data = [
        //     'cancellationReasonId' => 2,
        //     'sendCustomerNotification' => true,
        //     'subscriptionId' => $subscriptionId,
        //     'vendorAccountId' => 165209,
        //     'apiSecretKey' => 'ddb1040f-7b68-4805-9266-ac358f3ab645',
        // ];

        // $endpoint = 'https://store.payproglobal.com/api/Subscriptions/Suspend';

        // for finish subscription
        $data = [
            'sendCustomerNotification' => true,
            'reasonText' => 'I no longer need this product',
            'subscriptionId' => $subscriptionId,
            'vendorAccountId' => 165209,
            'apiSecretKey' => 'ddb1040f-7b68-4805-9266-ac358f3ab645',
        ];

        $endpoint = 'https://store.payproglobal.com/api/Subscriptions/Finish';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
    }


}
