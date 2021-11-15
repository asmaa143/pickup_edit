<?php

namespace App\Http\Resources;

use App\Models\ExtraDetail;
use App\Models\CartProductExtradetails;
use App\Models\Cart;
use App\Models\Store;
use App\Models\Product;
use App\Models\Discount;
use App\Models\CartProductExtra;
use App\Models\Coupon;
use Illuminate\Http\Resources\Json\JsonResource;

class CartPriceResource extends JsonResource
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
    $cart=Cart::where('customer_id',auth()->user()->id)->where('store_id',$storeId)->get();
            if(sizeof($cart)>0){ 
                foreach ($cart as  $value) {
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
                }

                             $priceOfProductAll=array_sum($priceOfProductarray);
                             $allprice=array_sum($price);
                             $deliveryPrice=0;
                             $taxPrice=0;
                             $totalprice=( $priceOfProductAll + $allprice + $deliveryPrice + $taxPrice );                
                          

            }else{
                             $priceOfProductAll=0;
                             $allprice=0;
                             $deliveryPrice=0;
                             $taxPrice=0;
                             $totalprice=( $priceOfProductAll + $allprice + $deliveryPrice+ $taxPrice );                
            }
        return [
            'id'            => $this->id,
            'deliveryPrice' => (string)0,
            'taxPrice'      => (string)0,
            'totalPrice'    => (string)$totalprice,
           
           
            
        ];
    }
}
