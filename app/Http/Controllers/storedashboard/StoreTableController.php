<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreTable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\StoreTableDataTable;
use App\Models\Store;
use App\Models\StoreBranch;
class StoreTableController extends Controller
{
    public function index(StoreTableDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.storetables.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $branches  = StoreBranch::Where('store_id',auth()->user()->store_id)->get();
        
        return view("storedashboard.storetables.create",compact("store","branches"));
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

     
        
         $data["branch_id"] = $request->branch_id;
         $data["tablenumber"] = $request->tablenumber;
         $data["store_id"] = $store->id;
       StoreTable::create($data);
     return redirect()->route("storetables.index");
    
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
        $branches  = StoreBranch::Where('store_id',auth()->user()->store_id)->get();
        $storetable = StoreTable::where("id",$id)->first();
        return view("storedashboard.storetables.edit",compact("store","branches","storetable"));
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $storetable = StoreTable::where("id",$id)->first();
        $data["branch_id"] = $request->branch_id;
         $data["tablenumber"] = $request->tablenumber;
         $data["store_id"] = $store->id;
         $storetable->update($data);
     return redirect()->route("storetables.index");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storetable = StoreTable::where("id",$id)->first();
        $storetable->delete();
        return response()->json(['status' => true]);
    }
}

