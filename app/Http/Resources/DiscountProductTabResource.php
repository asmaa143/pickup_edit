<?php

namespace App\Http\Resources;

use App\Models\Store;
use App\Models\Product;
use App\Models\Discount;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountProductTabResource extends JsonResource
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
       try{
          
          if($request->ordered_by==0){
                    $ordered='desc';
                    $type='id';
               }elseif($request->ordered_by==1){
                    $ordered='asc';
                    $type='id';
               }else{
                    $ordered='desc';
                    $type='id';
               }
            $products = ProductResource::collection(Product::where('store_id',$storeId)
                        ->join('discounts', 'discounts.product_id', '=', 'products.id')
                        ->select('products.*')
                        ->orderBy($type, $ordered)
                        ->get());

                if($request->ordered_by==2 ||$request->ordered_by==3 ){
                foreach($products as   $dis){
                     $discount=Discount::where('product_id',$dis->id)->first();
                     $priceOfProduct = $dis->default_price - ($dis->default_price * ($discount->value / 100));
                     $array[$priceOfProduct]=$dis;
                }
               
                $products= collect($array)->toArray();
                     if($request->ordered_by==2){
                         //asc
                      krsort($products);
                     }elseif($request->ordered_by==3){
                         //desc
                     ksort($products);
                     }
                //array_values($products);
                }

            
             return [
                'id' => 2000000,
                'title' => "الخصومات",
                'products'=> $products,
            ];

        
       }catch(\Exception $e){

        return $e;
       }

       
    }
}
