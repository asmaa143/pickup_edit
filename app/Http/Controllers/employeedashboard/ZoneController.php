<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Zone;
use App\Models\Area;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\ZoneDataTable;

class ZoneController extends Controller
{
   
    public function index(ZoneDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.zones.index");
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
        return view("admindashboard.zones.create",compact("states","cities"));
    }

  
    public function store(Request $request)
    {

       // dd(json_decode($request->points));
        $validators =[];
        foreach (LaravelLocalization::getSupportedLocales() as 
        $localeCode => $properties) {
             $validators['title-' . $localeCode] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
             $data[$localeCode] = ['title' => $request['title-' . $localeCode],
           ];
         }
         $data['state_id'] = $request->state_id;
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
     return redirect()->route("zones.index");
    
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
        $cities = City::all();
        return view("admindashboard.zones.edit",compact("cities",'states',"zone"));
    }

   
    public function update(Request $request, $id)
    {
        $zone = Zone::where('id',$id)->first();
        $validators =[];
        foreach (LaravelLocalization::getSupportedLocales() as 
        $localeCode => $properties) {
             $validators['title-' . $localeCode] = ['required',
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
        return redirect()->route("zones.index");
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
    }public function getzones($id){
        $zones = Zone::where('city_id',$id)->get();
        $text ="";
        foreach($zones as $zone){
            $text .='<option value="'.$zone->id.'">'.$zone->title.'</option>';
        }
        return response()->json(['status' => true,'data' => $text]);
    }
}
