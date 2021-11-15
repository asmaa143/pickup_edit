<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Zone;
use App\Models\Store;
use App\Models\Area;
use App\Models\ZonePrice;
use App\DataTables\ZonePriceDataTable;

class ZonePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(ZonePriceDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.zonesprices.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $store = Store::whereId(auth()->user()->store_id)->first();
        return view("storedashboard.zonesprices.create",compact("states","store"));
    }

  
    public function store(Request $request)
    {
        $store = Store::whereId(auth()->user()->store_id)->first();

        $zoneprice = new ZonePrice;
        $zoneprice->price = $request->price;
        $zoneprice->store_id = auth()->user()->store_id;
        $zoneprice->zone_id = $request->zone_id;
        $zoneprice->save();
        return redirect()->route("zonesprices.index");
    }public function storezone(Request $request){
        $store = Store::whereId(auth()->user()->store_id)->first();
        foreach($store->languages as $lang){
        $data[$lang->lang] = ['title' => $request['title-' . $lang->lang],
          ];
        }
        $data['state_id'] = $request->state_id;
        $data['city_id'] = $request->city_id;
        $data['store_id'] = $store->id;
        $data['text'] = $request->points;
         $zone = Zone::create($data);
         if($request->points){
             
         foreach(json_decode($request->points) as $point){
        $area = new Area;
        $area->lat = $point->lat;
        $area->lon = $point->lng;
        $area->zone_id = $zone->id;
        $area->save();
       }
    }
    $zoneprice = new ZonePrice;
        $zoneprice->price = $request->price;
        $zoneprice->store_id = auth()->user()->store_id;
        $zoneprice->zone_id = $zone->id;
        $zoneprice->save();
        return redirect()->route("zonesprices.index");
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = State::all();
        $store = Store::whereId(auth()->user()->store_id)->first();
        $zoneprice = ZonePrice::whereId($id)->first();
        return view("storedashboard.zonesprices.edit",compact("states","store","zoneprice"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $store = Store::whereId(auth()->user()->store_id)->first();

        $zoneprice = ZonePrice::whereId($id)->first();
        $zoneprice->price = $request->price;
        $zoneprice->store_id = auth()->user()->store_id;
        $zoneprice->zone_id = $request->zone_id;
        $zoneprice->save();
        return redirect()->route("zonesprices.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zoneprice = ZonePrice::where("id",$id)->first();
        $zoneprice->delete();
        return response()->json(['status' => true]);
    }
}
