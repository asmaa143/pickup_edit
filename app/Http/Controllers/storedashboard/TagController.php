<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\TagDataTable;
use App\Models\Store;
class TagController extends Controller
{
    public function index(TagDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.tags.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        return view("storedashboard.tags.create",compact("store"));
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
         $data["store_id"] = $store->id;
         $tag = Tag::create($data);
     return redirect()->route("tags.index");
    
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
        $tag = Tag::where("id",$id)->first();
        return view("storedashboard.tags.edit",compact("store","tag"));
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $tag = Tag::where("id",$id)->first();
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
         $data["store_id"] = $store->id;
         $tag->update($data);
     return redirect()->route("tags.index");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where("id",$id)->first();
        $tag->delete();
        return response()->json(['status' => true]);
    }
}
