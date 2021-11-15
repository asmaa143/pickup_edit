<?php

namespace App\Http\Resources;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferProductTabResource extends JsonResource
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

               }elseif($request->ordered_by==2){
                    $ordered='desc';
                    $type='default_price';

               }elseif($request->ordered_by==3){
                    $ordered='asc';
                    $type='default_price';;

               }else{
                    $ordered='desc';
                    $type='id';
               }
              $products=  ProductResource::collection(Product::where('store_id',$storeId)->orderby($type,$ordered)->where('is_offer',1)->take(15)->get());
             return [
                'id' => 1000000,
                'title' => " العروض ",
                'products'=> $products,
            ];
            
        
       }catch(\Exception $e){
        return $e;
       }

       
    }
}
