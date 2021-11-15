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


class OrderPriceResource extends JsonResource
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
    

                      
        return [
            'id'            => $this->id,
            'totalPrice'    => (string)$this->final_price,
            'taxPrice'      => (string)0,
        ];
  
           
           
            
    }
}
