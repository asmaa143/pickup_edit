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
use App\Models\Cart;
use App\Models\CartProductExtra;
use App\Models\CartProductExtradetails;
use App\Models\ExtraDetail;
use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class CartProductResource extends JsonResource
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
        ########################################################
        $header = $request->header('Authorization');
        if ($header <> null) {
            $auth = explode(' ', $header);
            $authtoken = $auth[1];
            
            if ($authtoken <> null) {
                $dislike = FavoriteProduct::where('customer_id', auth()->guard('customer')->user()->id)->where('product_id', $this->id)->orderby('id', 'desc')->first();
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
        $image = $this->image;
        if ($image == Null) {
            $image = '';
        } else {
            $image = asset($this->image);
        }
        $discount=Discount::where('product_id',$this->id)->first();
        if($discount){
        $priceOfProduct = $this->default_price - ($this->default_price * ($discount->value / 100));
        }else{
          $priceOfProduct=0;  
        }

        $ProductTag = TagResource::collection(Tag::
                join('products_tags', 'products_tags.tag_id', '=', 'tags.id')
                ->select('tags.*')
                ->orderBy('id', 'desc')
                ->get());
        $Category   =Category::where('id',$this->category_id)->first();
        $count      = ProductRate::where('product_id', $this->id)->count();
        if ($count <> 0) {
            $productratesum = ProductRate::where('product_id', $this->id)->sum('rate') / $count;
        }else{
              $productratesum =0;
        }

        $cart=Cart::where('product_id',$this->id)->where('customer_id',auth()->user()->id)->where('store_id',$storeId)->first();
        $extraId =CartProductExtra::where('cart_id',$cart->id)->pluck('extra_id');
        $extraproductId =CartProductExtra::where('cart_id',$cart->id)->pluck('id');
        foreach($extraResource=CartExtraResource::collection(Extra::whereIn('id',$extraId)->get()) as $ex){
            $ex->setattribute('cart_id', $cart->id);
        }

      
        // $extra = CartExtraResource::collection(Extra::whereIn('id',$extraId)->get());

        $newProduct=  Product::where('store_id',$storeId)->orderby('id','desc')->take(10)->get();
        
            foreach( $newProduct as  $new){
                if($new->id == $this->id){
                    $new =1;
                }else{
                    $new=0;
                }
            }

            #############################--PRODUCT--PRICE--##################################

 $value=Cart::where('customer_id',auth()->user()->id)->where('store_id',$storeId)->where('product_id',$this->id)->first();
            if($value){
               
                    $discount=Discount::where('product_id',$value->product_id)->orderby('id','desc')->first();
                    $product=Product::find($value->product_id);
                        if ($discount <> null) {
                         $priceOfProduct = $product->default_price - ($product->default_price * ($discount->value / 100));
                         }else{
                          $priceOfProduct=$product->default_price;  
                         }
                          $priceOfProductarray[]= $priceOfProduct *$value->quantity;;

                          $extras=  CartProductExtra::where('cart_id',$value['id'])->get();
                            if( sizeof($extras)>0){
                                 foreach( $extras as $extra) {
                                    $extradetails=CartProductExtradetails::where('cart_id',$value->id)->where('extra_id',$extra->extra_id)->get();
                                    if(sizeof($extradetails)>0){
                                        foreach($extradetails as $extradetail){
                                         $extraprice=ExtraDetail::find( $extradetail->extradetail_id);
                                         $price[]=$extraprice['price'];

                                        }

                                    }else{
                                         $price[]=0;

                                    }
                                 }
                                }
                

                             $priceOfProductAll=array_sum($priceOfProductarray);
                             $allprice=array_sum($price);
                             $totalprice=( $priceOfProductAll + $allprice );


}
            #################################################################################
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'image'       => $image,
            'calories'    => (string)$this->calories,
            'price'       => (string)$totalprice,
            'new'         => $new,
            'excute_time' => $this->preparation_time,
            'tags'        => $ProductTag,
            'category'    => $Category?$Category->title:"",
            'rate'        => $productratesum ,
            'count'       => $value->quantity,
            'like'        => $like,
            'status'      => (int)$this->status,
            'extra'       => $extraResource,
           
            
        ];

   

    }
}
