<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Plans & Billing',
            'user_package' => session()->get('UserPackages'),
        );

        return view('front.billing.index')->with($data);
    }
}
