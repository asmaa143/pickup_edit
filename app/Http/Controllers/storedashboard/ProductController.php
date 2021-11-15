<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\ProductDataTable;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Category;
use App\traits\generaltrait;
use App\Models\Discount;
use App\Models\Extra;
use Carbon\Carbon;
use App\Models\ExtraDetail;
class ProductController extends Controller
{
    use generaltrait;
    public function index(ProductDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.products.index");
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
        return view("storedashboard.products.create",compact("store","tags","categories"));
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
         $data["preparation_time"] = $request->preparation_time;
         $data["calories"] = $request->calories;
         $data["default_price"] = $request->default_price;
         $product = Product::create($data);
         $discount = new Discount;
         $discount->value = $request->value;
         $discount->epired_date = $request->epired_date;
         $discount->start_date = Carbon::now();
         $discount->product_id = $product->id;
         $discount->save();
         if($request->hasFile("image")){
            
            $product->image = $this->uploadimage($request->image,"products");
$product->save();
         }
         $product->tags()->attach($request->tag_id);
         foreach($store->languages as $lang){
          $count = count($request['extratitle-' . $lang->lang]);
         }
      
    

      //   dd($count);
            for($i = 0;$i < $count;$i++) {
                foreach($store->languages as $lang){
                    $data1[$lang->lang] = ['title' => $request['extratitle-' . $lang->lang][$i],
                ];
                   }
                $data1['product_id'] = $product->id;
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
          
              if($request["extrprice$i"]){
             $count1 =  count($request["extrprice$i"]);
              }else{
                  $count1= 0;
              }
               for($j = 0;$j < $count1;$j++) {
                foreach($store->languages as $lang){
                    $data2[$lang->lang] = ['title' => $request["extratitledetail$i-" . $lang->lang][$j],
                ];
                   }
                   $data2["price"] = $request["extrprice$i"][$j];
                   $data2["extra_id"] = $extra->id;
                 $ex2detail =  ExtraDetail::create($data2);
          if($request["default$i"]){
                 if(array_key_exists($j, $request["default$i"])){
                  if($request["default$i"][$j] == 1){
                  $ex2detail->default = $request["default$i"][$j];
                  }
                  }else{
                    $ex2detail->default = 0;  
                  }
                }
                 $ex2detail->save();
               }
                 }
           
           
            
         
        
     return redirect()->route("products.index");
    
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
      $product = Product::where("id",$id)->first();
      $discount =  Discount::whereProductId($id)->first();
      return view("storedashboard.products.edit",compact("store","tags","categories","product","discount"));
    }

   
    public function update(Request $request, $id)
    {
      $store = Store::where("id",auth()->user()->store_id)->first();
      $product = Product::where("id",$id)->first();
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
       $data["preparation_time"] = $request->preparation_time;
       $data["calories"] = $request->calories;
       $data["default_price"] = $request->default_price;
       $product->update($data);
       $discount =  Discount::whereProductId($id)->first();
       if($discount){
       
        $discount->value = $request->value;
        $discount->epired_date = $request->epired_date;
        $discount->start_date = Carbon::now();
        $discount->product_id = $product->id;
        $discount->save();
       }else{
        $discount = new Discount;
       $discount->value = $request->value;
       $discount->epired_date = $request->epired_date;
       $discount->start_date = Carbon::now();
       $discount->product_id = $product->id;
       $discount->save();
       }
       if($request->hasFile("image")){
        $this->deleteimage($product->image);

          $product->image = $this->uploadimage($request->image,"products");
$product->save();
       }
       $product->tags()->sync($request->tag_id);
       foreach($store->languages as $lang){
        $count = count($request['extratitle-' . $lang->lang]);
       }
    
  

       Extra::where("product_id",$id)->delete();
          for($i = 0;$i < $count;$i++) {
              foreach($store->languages as $lang){
                  $data1[$lang->lang] = ['title' => $request['extratitle-' . $lang->lang][$i],
              ];
                 }
              $data1['product_id'] = $product->id;
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
            if($request["extrprice$i"]){
           $count1 =  count($request["extrprice$i"]);
            }else{
                $count1= 0;
            }
             for($j = 0;$j < $count1;$j++) {
              foreach($store->languages as $lang){
                  $data2[$lang->lang] = ['title' => $request["extratitledetail$i-" . $lang->lang][$j],
              ];
                 }
                 $data2["price"] = $request["extrprice$i"][$j];
                 $data2["extra_id"] = $extra->id;
               $ex2detail =  ExtraDetail::create($data2);
        if($request["default$i"]){
               if(array_key_exists($j, $request["default$i"])){
                if($request["default$i"][$j] == 1){
                $ex2detail->default = $request["default$i"][$j];
                }
                }else{
                  $ex2detail->default = 0;  
                }
              }
               $ex2detail->save();
             }
               }
        
     return redirect()->route("products.index");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where("id",$id)->first();
      $this->deleteimage($product->image);
        $product->delete();
        return response()->json(['status' => true]);
    }
}

