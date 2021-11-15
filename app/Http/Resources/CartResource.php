<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\Store;
use App\Models\Product;
use App\Models\Discount;
use App\Models\CartProductExtra;
use App\Models\CartProductExtradetails;
use App\Models\ExtraDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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

     
        $productId=Cart::where('customer_id',auth()->user()->id)->where('store_id',$storeId)->pluck('product_id');
        $products= CartProductResource::collection(Product::whereIn('id',$productId)->get());
        $cartCustomer= Cart::where('customer_id',auth()->user()->id)->first();

        return [
            'id'       => $this->id,
            'products' => $products,
            'price'    => new CartPriceResource($cartCustomer),
           
           
            
        ];
    }
}
