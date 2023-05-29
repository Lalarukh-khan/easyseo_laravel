<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'title' => 'Setting',
            'key' => Setting::latest()->first(),
        );

        return view('admin.setting.api_setting')->with($data);
    }

    public function save(Request $request)
    {
        $setting = new Setting();
        if (isset($request->id) && !empty($request->id)) {
            $setting = Setting::hashidFind($request->id);
        }
        $setting->api_key = base64_encode($request->api_key);
        $setting->save();
        session()->flash('success-msg','API key Added Successfully');

        return response()->json([
            'reload' => true,
        ]);
    }
}
