<?php

namespace App\Http\Controllers\employeedashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Major;
use App\Models\State;
use App\Models\City;
use App\Models\Zone;
use App\Models\StoreEmployee;
use App\traits\generaltrait;
use App\Models\StoreLanguage;
use App\Models\Language;
use Illuminate\Support\Facades\Hash;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\StoreDataTable;

class StoreController extends Controller
{
    use generaltrait;
    public function index(StoreDataTable $dataTable)
    {
     return $dataTable->render("admindashboard.stores.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();
        $states = State::all();
        $cities = City::all();
        $zones = Zone::all();
       return view("admindashboard.stores.create",compact("states","cities","zones","majors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        $password =Hash::make($request->password);
        $store = Store::create($data);
        $store->password = $password;
        $store->api_key = Hash::make(mt_rand(1000000000, 9999999999));
        $store->save();
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

        foreach($request->lang as $lang){
            if($lang == $localeCode){
            $storelang = new StoreLanguage;
            $storelang->lang = $lang;
            $storelang->title = $properties['native'];
            if($language = Language::where("shortcut",$localeCode)->first()){
                $storelang->image = $language->image;
            }
            $storelang->store_id  = $store->id;
            $storelang->save();
            }
        }
    }
        if($request->logo){
            $store->logo = $this->uploadimage($request->logo,"stores");
            $store->save();
            } if($request->contract_image){
                $store->contract_image = $this->uploadimage($request->contract_image,"stores");
                $store->save();
                }
        
         $employee = StoreEmployee::create($data);
         $employee->store_id = $store->id;
         $employee->password = $password;
         $employee->save();
         return redirect()->route("stores.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::where("id",$id)->first();
       return view("admindashboard.stores.show",compact("store"));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $majors = Major::all();
        $states = State::all();
        $cities = City::all();
        $zones = Zone::all();
        $store = Store::where("id",$id)->first();
       return view("admindashboard.stores.edit",compact("states","cities","zones","majors","store"));
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
        $store = Store::where("id",$id)->first();
        $data = $request->all();
        $password1 = $store->password;
        $password =Hash::make($request->password);
       $store->update($data);
       if($request->password){
        $store->password = $password;
       }else{
        $store->password = $password1;   
       }
        
        $store->save();
        if($request->lang){
            StoreLanguage::where("store_id",$store->id)->delete();
        foreach($request->lang as $lang){
            $storelang = new StoreLanguage;
            $storelang->lang = $lang;
            $storelang->store_id  = $store->id;
            $storelang->save();
        }}
        if($request->logo){
            $this->deleteimage($store->logo);
            $store->logo = $this->uploadimage($request->logo,"stores");
            $store->save();
            } if($request->contract_image){
                $this->deleteimage($store->contract_image);

                $store->contract_image = $this->uploadimage($request->contract_image,"stores");
                $store->save();
                }
    
         return redirect()->route("stores.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::where("id",$id)->first();
        if($store->logo){
            $this->deleteimage($store->logo);
            } if($store->contract_image){
                $this->deleteimage($store->contract_image);
                }
        $store->delete();
        return response()->json(['status' =>true]);
    }
}
