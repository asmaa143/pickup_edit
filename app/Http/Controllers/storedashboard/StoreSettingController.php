<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreSetting;
class StoreSettingController extends Controller
{
   public  function addminimum(){
     $setting = StoreSetting::whereStoreId(auth()->user()->store_id)->firstOrNew();
     return view("storedashboard.minimum.create",compact("setting"));
   }public function storeminimum(Request $request){
       $setting = StoreSetting::whereStoreId(auth()->user()->store_id)->firstOrNew();
       $setting->store_id = auth()->user()->store_id;
       if($request->active == 1){
          $setting->active = $request->active;
          $setting->least_price = $request->least_price;
          $setting->save();
       }else{
        $setting->active = 0;
        $setting->least_price = 0;
        $setting->save();
       }
       return redirect()->back();
   }
}
