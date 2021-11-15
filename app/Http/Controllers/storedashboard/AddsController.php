<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\AddsDataTable;
use App\Models\Store;
use App\Models\Adds;
use App\Models\Tag;
use App\Models\Category;
use App\traits\generaltrait;
use App\Models\Extra;
use App\Models\ExtraDetail;
class AddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

        use generaltrait;
        public function index(AddsDataTable $dataTable)
        {
         return $dataTable->render("storedashboard.adds.index");
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $store = Store::where("id",auth()->user()->store_id)->first();
            $tags = Tag::where('store_id',$store->id)->get();
            $categories = Category::where('store_id',$store->id)->get();
            $products = Product::where('is_offer',0)->whereStoreId(auth()->user()->store_id)->get(); 
            return view("storedashboard.adds.create",compact("store","tags","categories","products"));
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
   {
       //         dd($request->all());
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
             $data["category_id"] = $request->category_id;
             $data["default_price"] = $request->default_price;
             $adds = Adds::create($data);
             $product = Product::create($data);
             if($request->hasFile("image")){         
                $adds->image = $this->uploadimage($request->image,"adds");
               $adds->save();
             }
             $product->is_offer = 1;
             $product->add_id = $adds->id;
             $product->image = $adds->image;
             $product->save();
             $product->tags()->attach($request->tag_id);
             foreach($store->languages as $lang){
              $count = count($request['extratitle-' . $lang->lang]);
             }
          
        
    $product_id = $product->id;
          //   dd($count);
                for($i = 0;$i < $count;$i++) {
                    foreach($store->languages as $lang){
                        $data1[$lang->lang] = ['title' => $request['extratitle-' . $lang->lang][$i],
                    ];
                       }
                    $data1['product_id'] = $product_id ;
                  
                   $extra = Extra::create($data1);
                  if($request->multichoice){
                     if(array_key_exists($i, $request->multichoice)){
                      if($request->multichoice[$i] == 1){
                      $extra->multichoice = $request->multichoice[$i];
                      }
                      }else{
                        $extra->multichoice = 0;  
                      } }
                      if($request->optional){
                                            if(array_key_exists($i, $request->optional)){
                        if($request->optional[$i] == 1){
                        $extra->optional = $request->optional[$i];
                        }
                        }else{
                          $extra->optional = 0;  
                        }
                    }
                   $extra->save();
              
                  if($request["product_id$i"]){
                 $count1 =  count($request["product_id$i"]);
                  }else{
                      $count1= 0;
                  }
                   for($j = 0;$j < $count1;$j++) {
                       $product1 = Product::whereId($request["product_id$i"][$j])->first();
                    foreach($store->languages as $lang){
                        
                        $data2[$lang->lang] = ['title' => $product1->translate($lang->lang)->title
                    ];
                       }
                       $data2["product_id"] = $request["product_id$i"][$j];
                       $data2["extra_id"] = $extra->id;
                     //  dd($data2);
                     $ex2detail =  ExtraDetail::create($data2);
         
                     $ex2detail->save();
                   }
                     }
               
               
                
             
            
         return redirect()->route("adds.index");
        
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
          $tags = Tag::where('store_id',$store->id)->get();
          $categories = Category::where('store_id',$store->id)->get();
          $add = Adds::where("id",$id)->first();
          $product = Product::where("add_id",$add->id)->first();
          $products = Product::where('is_offer',0)->whereStoreId(auth()->user()->store_id)->get(); 

          return view("storedashboard.adds.edit",compact("store","tags","categories","product","products","add"));
        }
    
       
        public function update(Request $request, $id)
        {
            $store = Store::where("id",auth()->user()->store_id)->first();
            $adds = Adds::where("id",$id)->first();
            $product = Product::where("add_id",$adds->id)->first();
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
             $data["category_id"] = $request->category_id;
             $data["default_price"] = $request->default_price;
              $adds->update($data);
             $product->update($data);
             if($request->hasFile("image")){   
                $this->deleteimage($adds->image);
      
                $adds->image = $this->uploadimage($request->image,"adds");
               $adds->save();
             }
             $product->is_offer = 1;
             $product->add_id = $adds->id;
             $product->image = $adds->image;
             $product->save();
             $product->tags()->attach($request->tag_id);
             foreach($store->languages as $lang){
              $count = count($request['extratitle-' . $lang->lang]);
             }
             Extra::where("product_id",$product->id)->delete();
        
    $product_id = $product->id;
          //   dd($count);
                for($i = 0;$i < $count;$i++) {
                    foreach($store->languages as $lang){
                        $data1[$lang->lang] = ['title' => $request['extratitle-' . $lang->lang][$i],
                    ];
                       }
                    $data1['product_id'] = $product_id ;
                  
                   $extra = Extra::create($data1);
                  if($request->multichoice){
                     if(array_key_exists($i, $request->multichoice)){
                      if($request->multichoice[$i] == 1){
                      $extra->multichoice = $request->multichoice[$i];
                      }
                      }else{
                        $extra->multichoice = 0;  
                      } }
                      if($request->optional){
                                            if(array_key_exists($i, $request->optional)){
                        if($request->optional[$i] == 1){
                        $extra->optional = $request->optional[$i];
                        }
                        }else{
                          $extra->optional = 0;  
                        }
                    }
                   $extra->save();
              
                  if($request["product_id$i"]){
                 $count1 =  count($request["product_id$i"]);
                  }else{
                      $count1= 0;
                  }
                   for($j = 0;$j < $count1;$j++) {
                       $product1 = Product::whereId($request["product_id$i"][$j])->first();
                    foreach($store->languages as $lang){
                        
                        $data2[$lang->lang] = ['title' => $product1->translate($lang->lang)->title
                    ];
                       }
                       $data2["product_id"] = $request["product_id$i"][$j];
                       $data2["extra_id"] = $extra->id;
                     //  dd($data2);
                     $ex2detail =  ExtraDetail::create($data2);
         
                     $ex2detail->save();
                   }
                     }
               
               
                
             
            
         return redirect()->route("adds.index");
        
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $adds = Adds::where("id",$id)->first();
          $this->deleteimage($adds->image);
            $adds->delete();
            return response()->json(['status' => true]);
        }
}
