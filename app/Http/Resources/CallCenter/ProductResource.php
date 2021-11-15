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
use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class ProductResource extends JsonResource
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
       
       
        
      $extra= ExtraResource::collection(Extra::where('product_id',$this->id)->get());

        
           
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'extra'       =>$extra,
           
            
        ];

   

    }
}
