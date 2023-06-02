<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    public function index()
    {
        if (session()->get('authUser')->user_type != 'main') {
            abort(403,'You are not authorized to access that page');
            die();
        }

		$user_package = session()->get('UserPackages');

        $data = array(
            'title' => 'Settings',
            'edit' => auth('web')->user(),
			'user_package' => (!empty($user_package) ? $user_package : 0),
        );
        return view('front.setting.index')->with($data);
    }

}
