<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
// use Laravel\Paddle\Subscription;

class BillingController extends Controller
{
    public function index()
    {
        if (session()->get('authUser')->user_type != 'main') {
            abort(403,'You are not authorized to access that page');
            die();
        }

        if (request()->input('paddle-success-msg')) {
            session()->flash('success-msg',request()->input('paddle-success-msg'));
        }

        $data = array(
            'title' => 'Plans & Billing',
            'user_package' => session()->get('UserPackages'),
            'packageData' => session()->get('PackageData'),
        );

        return view('front.billing.index')->with($data);
    }

    public function get_paylink(Request $request) {

        $package = Package::find($request->package_id);

        $current_plan = session()->get('PackageData');
        $UserPackages = session()->get('UserPackages');

        $authUser = auth('web')->user();

        if ($current_plan->plan_code == 'FRP0' || ($authUser->subscriptions()->where('ends_at',null)->where('paddle_status','!=','deleted')->count() == 0 && empty($UserPackages->subscription_id))) {
            $payLink = $authUser->newSubscription($package->title, $package->paddle_plan_id)
            ->returnTo(route('user.billing.all',['paddle-success-msg' => 'Package Purchased Successfully']))
            ->create();

            return response()->json([
                'status' => true,
                'payLink' => $payLink
            ]);
        }

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
