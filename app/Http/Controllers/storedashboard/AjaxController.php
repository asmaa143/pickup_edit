<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\State;
use App\Models\City;
class AjaxController extends Controller
{
    public function getstorecities($id){
        $cities = City::where('state_id',$id)->get();
        $text ="";
        foreach($cities as $city){
            $text .='<option value="'.$city->id.'">'.$city->title.'</option>';
        }
        return response()->json(['status' => true,'data' => $text]);
    } public function getstorezones($id){
        $zones = Zone::where('city_id',$id)->whereIn('store_id',[NULL,auth()->user()->store_id])->get();
        $text ="";
        foreach($zones as $zone){
            $text .='<option value="'.$zone->id.'">'.$zone->title.'</option>';
        }
        return response()->json(['status' => true,'data' => $text]);
    }
}
