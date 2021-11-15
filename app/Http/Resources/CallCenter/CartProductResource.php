<?php

namespace App\Http\Resources\CallCenter;

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
        ###############################################################################################
        $cart=Cart::where('product_id',$this->id)->where('callcenter_id',auth()->user()->id)->where('store_id',$storeId)->first();
        $extraId =CartProductExtra::where('cart_id',$cart->id)->pluck('extra_id');
        $extraproductId =CartProductExtra::where('cart_id',$cart->id)->pluck('id');
        foreach($extraResource=Extra::whereIn('id',$extraId)->get() as $ex){

            $extradetailId=CartProductExtradetails::where('extra_id',$ex->id)->where('cart_id',$cart->id)->pluck('extradetail_id');
            $array[]=$ex->title;
           foreach(ExtraDetail::whereIn('id',$extradetailId)->get() as $extradetails){
                $array[]=$extradetails->title;
           } 

        }


            #############################--PRODUCT--PRICE--##################################

 $value=Cart::where('callcenter_id',auth()->user()->id)->where('store_id',$storeId)->where('product_id',$this->id)->first();
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
            'price'       => (string)$totalprice,
            'count'       => $value->quantity,
            'description'       =>  implode(" ",$array),
           
            
        ];

   

    }
}
