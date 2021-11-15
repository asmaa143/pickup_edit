<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkShift;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\WorkShiftDataTable;
use App\Models\Store;
class WorkShiftController extends Controller
{
    public function index(WorkShiftDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.workshifts.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        return view("storedashboard.workshifts.create",compact("store"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();

        $validators =[];
         foreach($store->languages as $lang){
             $validators['title-' . $lang->lang] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach($store->languages as $lang){
             $data[$lang->lang] = ['title' => $request['title-' . $lang->lang],
           ];
         }
         $data["fromtime"] = $request->fromtime;
         $data["totime"] = $request->totime;
         $data["store_id"] = $store->id;
         $workshift = WorkShift::create($data);
     return redirect()->route("workshifts.index");
    
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
        $store = Store::where("id",auth()->user()->store_id)->first();
        $workshift = WorkShift::where("id",$id)->first();
        return view("storedashboard.workshifts.edit",compact("store","workshift"));
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $workshift = WorkShift::where("id",$id)->first();
        $validators =[];
         foreach($store->languages as $lang){
             $validators['title-' . $lang->lang] = ['required',
             ];
         }   
         $request->validate($validators);
         foreach($store->languages as $lang){
             $data[$lang->lang] = ['title' => $request['title-' . $lang->lang],
           ];
         }
         $data["fromtime"] = $request->fromtime;
         $data["totime"] = $request->totime;
         $data["store_id"] = $store->id;
         $workshift->update($data);
     return redirect()->route("workshifts.index");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workshift = WorkShift::where("id",$id)->first();
        $workshift->delete();
        return response()->json(['status' => true]);
    }
}
