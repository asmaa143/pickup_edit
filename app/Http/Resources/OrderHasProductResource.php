<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Discount;
use App\Models\ProductTag;
use App\Models\ProductRate;
use App\Models\FavoriteProduct;
use App\Models\Extra;
use App\Models\Store;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class OrderHasProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

          $storeId=null;
         if($store=Store::where('api_key',$request->header('ApiKey'))->first())
         $storeId=$store->id;

        $product=Product::find($this->product_id);
        ########################################################
        $header = $request->header('Authorization');
        if ($header <> null) {
            $auth = explode(' ', $header);
            $authtoken = $auth[1];
            
            if ($authtoken <> null) {
                $dislike = FavoriteProduct::where('customer_id', auth()->guard('customer')->user()->id)->where('product_id', $this->product_id)->orderby('id', 'desc')->first();
                if ($dislike <> null) {
                    $like = true;
                } else {
                    $like = false;
                }
                
                
            } else {
                $like = false;
            }
        } else {
            $like = false;
        }
        $image =  $product->image;
        if ($image == Null) {
            $image = '';
        } else {
            $image = asset( $product->image);
        }
        $discount=Discount::where('product_id', $product->id)->first();
        if($discount){
        $priceOfProduct =  $product->default_price - ( $product->default_price * ($discount->value / 100));
        }else{
          $priceOfProduct=0;  
        }

        $ProductTag = TagResource::collection(Tag::
                join('products_tags', 'products_tags.tag_id', '=', 'tags.id')
                ->select('tags.*')
                ->orderBy('id', 'desc')
                ->get());
        $Category   =Category::where('id', $product->category_id)->first();
        $count      = ProductRate::where('product_id',  $product->id)->count();
        if ($count <> 0) {
            $productratesum = ProductRate::where('product_id',  $product->id)->sum('rate') / $count;
        }else{
              $productratesum =0;
        }


      $extra= ExtraResource::collection(Extra::where('product_id', $product->id)->get());

        $newProduct=  Product::where('store_id',$storeId)->orderby('id','desc')->take(10)->get();
        
            foreach( $newProduct as  $new){
                if($new->id ==  $product->id){
                    $new =1;
                }else{
                    $new=0;
                }
            }
        return [
            'id'          =>  $product->id,
            'title'       =>  $product->title,
            'description' =>  $product->description,
            'image'       =>  $image,
            'calories'    =>  (string)$product->calories,
            'price'       =>  (string)$this->price,
            'count'       =>  (int)$this->quantity,
            'extra'       =>  $extra,
           
            
        ];

   

    }
}
