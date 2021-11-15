<?php

namespace App\Http\Controllers\employeedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\traits\generaltrait;
use App\Models\State;
use App\Models\City;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\CityDataTable;
class CityController extends Controller
{
    
    use generaltrait;
    public function index(CityDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.cities.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view("admindashboard.cities.create",compact("states"));
    }

  
    public function store(Request $request)
    {
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
          City::create($data);
     return redirect()->route("cities.index");
    
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
        $city = City::where('id',$id)->first();
        $states = State::all();
        return view("admindashboard.cities.edit",compact("city",'states'));
    }

   
    public function update(Request $request, $id)
    {
        $city = City::where('id',$id)->first();
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
        $city->update($data);
     return redirect()->route("cities.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::where('id',$id)->first();
        $city->delete();
        return response()->json(['status' => true]);
    }public function getcities($id){
        $cities = City::where('state_id',$id)->get();
        $text ="";
        foreach($cities as $city){
            $text .='<option value="'.$city->id.'">'.$city->title.'</option>';
        }
        return response()->json(['status' => true,'data' => $text]);
    }
}
