<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    public function setting(){
        $setting = Setting::first();
        return view("admindashboard.setting.index",compact("setting"));
    }public function savesetting(Request $request){
        $setting = Setting::first();
        $setting->serverurl = $request->serverurl;
        $setting->save();
        return redirect()->back();
    }
}
