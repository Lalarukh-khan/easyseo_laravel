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
            'user_package' => UserPackage::where('user_id',auth('web')->id())->latest()->first(),
            'packageData' => session()->get('PackageData'),
        );

        return view('front.billing.index')->with($data);
    }

    public function get_paylink(Request $request)
    {
        $authUser = auth('web')->user();
        $package = Package::find($request->package_id);

        $UserPackages = UserPackage::with('package')->where('user_id', $authUser->id)->latest()->first();
        $current_plan = $UserPackages->package;

        if ($current_plan->plan_code == 'FRP0') {
            $payLink = $authUser->newSubscription($package->title, $package->paddle_plan_id)
                ->returnTo(route('user.billing.all', ['paddle-success-msg' => 'Package Purchased Successfully']))
                ->create();

            return response()->json([
                'status' => true,
                'payLink' => $payLink
            ]);
        }

        if (empty($UserPackages->subscription_id)) {
            $payLink = $authUser->newSubscription($package->title, $package->paddle_plan_id)
                ->returnTo(route('user.billing.all', ['paddle-success-msg' => 'Package Purchased Successfully']))
                ->create();

            return response()->json([
                'status' => true,
                'payLink' => $payLink
            ]);
        }

        $isUpgrade = false;

        if ($package->id > $UserPackages->package_id) {
            $authUser->subscription($current_plan->title)->swapAndInvoice($package->paddle_plan_id);
            $isUpgrade = true;
        } else {
            $authUser->subscription($current_plan->title)->swap($package->paddle_plan_id);
        }

        session()->flash('success-msg', 'Subscription Changed Successfully');

        return response()->json([
            'status' => true,
            'route' => route('user.billing.all'),
            'isUpgrade' => $isUpgrade
        ]);
    }
}
