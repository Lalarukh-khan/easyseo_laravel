<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
		$user_package = session()->get('UserPackages');

        $data = array(
            'title' => 'Settings',
            'edit' => auth('web')->user(),
			'user_package' => (!empty($user_package) ? $user_package : 0),
        );
        return view('front.setting.index')->with($data);
    }

}
