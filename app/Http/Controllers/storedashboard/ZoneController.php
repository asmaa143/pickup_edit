<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Store;
use App\Models\Zone;
use App\Models\Area;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\ZoneStoreDataTable;

class ZoneController extends Controller
{
   
    public function index(ZoneStoreDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.zonesstore.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $cities = City::all();
        $store = Store::whereId(auth()->user()->store_id)->first();
        return view("storedashboard.zonesstore.create",compact("states","cities","store"));
    }

  
    public function store(Request $request)
    {
        $store = Store::whereId(auth()->user()->store_id)->first();


       // dd(json_decode($request->points));
        $validators =[];
        foreach (LaravelLocalization::getSupportedLocales() as 
        $localeCode => $properties) {
             $validators['title-' . $localeCode] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach($store->languages as $lang){
            $data[$lang->lang] = ['title' => $request['title-' . $lang->lang],
              ];
            }
         $data['state_id'] = $request->state_id;
         $data['store_id'] = auth()->user()->store_id;
         $data['city_id'] = $request->city_id;
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
     return redirect()->route("zonesstore.index");
    
    }

   
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
        $zone = Zone::where('id',$id)->first();
        // dd($zone->text);
        $states = State::all();
        $store = Store::whereId(auth()->user()->store_id)->first();

        $cities = City::all();
        return view("storedashboard.zonesstore.edit",compact("cities",'states',"zone","store"));
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::whereId(auth()->user()->store_id)->first();

        $zone = Zone::where('id',$id)->first();
        $validators =[];
        foreach($store->languages as $lang){
            $data[$lang->lang] = ['title' => $request['title-' . $lang->lang],
              ];
            }
         $request->validate($validators);
         foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
             $data[$localeCode] = ['title' => $request['title-' . $localeCode],
           ];
         }
         $data['state_id'] = $request->state_id;
         $data['city_id'] = $request->city_id;
         if($request->points){
         $data['text'] = $request->points;}
          $zone->update($data);
          if($request->points){
            Area::where('zone_id',$id)->delete();
          foreach(json_decode($request->points) as $point){
         $area = new Area;
         $area->lat = $point->lat;
         $area->lon = $point->lng;
         $area->zone_id = $zone->id;
         $area->save();
        }
    }
        return redirect()->route("zonesstore.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = Zone::where('id',$id)->first();
        $zone->delete();
        return response()->json(['status' => true]);
    }
}
