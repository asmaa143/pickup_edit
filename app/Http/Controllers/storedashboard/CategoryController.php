<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\CategoryDataTable;
use App\Models\Store;
use App\traits\generaltrait;

class CategoryController extends Controller
{
    use generaltrait;
    public function index(CategoryDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.categories.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        return view("storedashboard.categories.create",compact("store"));
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
         $category = Category::create($data);
         if($request->hasFile("image")){
            
            $category->image = $this->uploadimage($request->image,"categories");
$category->save();
         }
     return redirect()->route("categories.index");
    
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
        $category = Category::where("id",$id)->first();
        return view("storedashboard.categories.edit",compact("store","category"));
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $category = Category::where("id",$id)->first();
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
         $category->update($data);
         if($request->hasFile("image")){
            $this->deleteimage($category->image);
            $category->image = $this->uploadimage($request->image,"categories"); 
           $category->save();
         }
        
     return redirect()->route("categories.index");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where("id",$id)->first();
      $this->deleteimage($category->image);
        $category->delete();
        return response()->json(['status' => true]);
    }
}
