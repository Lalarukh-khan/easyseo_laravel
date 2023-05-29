<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Help Desk'
        );
        return view('front.help.index')->with($data);
    }

}
