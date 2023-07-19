<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;
// use Laravel\Paddle\Subscription;

class BillingController extends Controller
{
    public function index()
    {
        if (session()->get('authUser')->user_type != 'main') {
            abort(403, 'You are not authorized to access that page');
            die();
        }

        if (request()->input('paddle-success-msg')) {
            session()->flash('success-msg', request()->input('paddle-success-msg'));
        }

        $data = array(
            'title' => 'Plans & Billing',
            'user_package' => session()->get('UserPackages'),
            'packageData' => session()->get('PackageData'),
        );

        return view('front.billing.index')->with($data);
    }

    public function get_paylink(Request $request)
    {

        $package = Package::find($request->package_id);

        $current_plan = session()->get('PackageData');
        $UserPackages = session()->get('UserPackages');
        $authUser = auth('web')->user(); 
         
            if($current_plan->plan_code == 'FRP0'){
                $payLink = $authUser->newSubscription($package->title, $package->paddle_plan_id)
                ->returnTo(route('user.billing.all', ['paddle-success-msg' => 'Package Purchased Successfully']))
                ->create();

                return response()->json([
                    'status' => true,
                    'payLink' => $payLink
                ]);
            }
            
        $user_pkg =   UserPackage::where('user_id',$authUser->id)->latest()->first();  
            
            if(empty($user_pkg->subscription_id)){ 
                $payLink = $authUser->newSubscription($package->title, $package->paddle_plan_id)
                ->returnTo(route('user.billing.all', ['paddle-success-msg' => 'Package Purchased Successfully']))
                ->create();

                return response()->json([
                    'status' => true,
                    'payLink' => $payLink
                ]);
            }
            
            
      
  

        $isUpgrade = false;
        // dd($current_plan->paddle_plan_id,$package->paddle_plan_id);

        if ($package->id > $UserPackages->package_id) {

            // $authUser->subscription($current_plan->title)->swapAndInvoice($package->paddle_plan_id);
            $authUser->subscription($current_plan->title)->swapAndInvoice($package->paddle_plan_id);

            $isUpgrade = true;
        }
        else{
            $authUser->subscription($current_plan->title)->swap($package->paddle_plan_id);
        }

        // $form_fields_array = [
        //     'vendor_id' => config('cashier.vendor_id'),
        //     'vendor_auth_code' => config('cashier.vendor_auth_code'),
        //     'subscription_id' => $UserPackages->subscription_id,
        //     'plan_id' => $package->paddle_plan_id,
        //     'bill_immediately' => true,
        //     'prorate' => false,
        // ];

        // dd($form_fields_array);

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://sandbox-vendors.paddle.com/api/2.0/subscription/users/update',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => 'vendor_id='.config('cashier.vendor_id').'&vendor_auth_code='.config('cashier.vendor_auth_code').'&subscription_id='.$UserPackages->subscription_id.'&plan_id='.$package->paddle_plan_id.'&bill_immediately='.$isUpgrade.'&prorate=false',
        //     CURLOPT_HTTPHEADER => array(
        //         'Content-Type: application/x-www-form-urlencoded'
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);

        // dd($response);
        // echo $response;


        session()->flash('success-msg', 'Subscription Changed Successfully');

        return response()->json([
            'status' => true,
            'route' => route('user.billing.all'),
            'isUpgrade' => $isUpgrade
        ]);



        return response()->json([
            'status' => false,
        ]);
    }

    // public function get_paylink(Request $request) {

    //     $package = Package::find($request->package_id);

    //     $current_plan = session()->get('PackageData');

    //     if ($current_plan->plan_code == 'FRP0' ||  Subscription::query()->active()->count() == 0) {
    //         $payLink = auth('web')->user()->newSubscription($package->title, $package->paddle_plan_id)
    //         ->returnTo(route('user.billing.all',['paddle-success-msg' => 'Package Purchased Successfully']))
    //         ->create();

    //         return response()->json([
    //             'status' => true,
    //             'payLink' => $payLink
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => false,
    //     ]);

    //     // dd(Subscription::query()->active()->count());

    //     // $payLink = auth('web')->user()->newSubscription($package->title, $package->paddle_plan_id)
    //     //     ->returnTo(route('user.subscription'))
    //     //     ->create();

    //     // return response()->json([
    //     //     'payLink' => $payLink
    //     // ]);
    // }
}