<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

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
        );

        return view('front.billing.index')->with($data);
    }
}
