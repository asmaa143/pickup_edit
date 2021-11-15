<?php

namespace App\Http\Resources;

use App\Models\OfferStore;
use App\Models\Store;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class IndexResource extends JsonResource
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
        $discountProduct = Product::where('store_id',$storeId)
                ->join('discounts', 'discounts.product_id', '=', 'products.id')
                ->select('products.*')
                ->orderBy('id', 'desc')
                ->take(10)->get();

        #########################################################
        $storeOffer=StoreOfferResource::collection(OfferStore::where('store_id',$storeId)->get());
        if( sizeof($storeOffer) < 0 ){
             $storeOffer="";
          }
        #########################################################
        $newProduct=ProductResource::collection(Product::where('store_id',$storeId)->orderby('id','desc')->where('is_offer',0)->take(10)->get());
        if( sizeof($newProduct) < 0 ){
             $newProduct="";
          }
        #########################################################
        $newOffer=ProductResource::collection(Product::where('store_id',$storeId)->orderby('id','desc')->where('is_offer',1)->take(10)->get());
        if( sizeof($newOffer) < 0 ){
             $newOffer="";
          }
        #########################################################
        $mostRequest=ProductResource::collection(Product::where('store_id',$storeId)->orderby('id','desc')->take(10)->get());
          if( sizeof($mostRequest) < 0 ){
             $mostRequest="";
          }
        #########################################################
        $header = $request->header('Authorization');
            if ($header <> null) {
                $auth = explode(' ', $header);
                $authtoken = $auth[1];
                
                if ($authtoken <> null) {
                   $currentOrder=new OrderResource(Order::where('customer_id',auth()->guard('customer')->user()->id)->where('status',1)->first());
                   $lastOrder= OrderResource::collection(Order::where('customer_id',auth()->guard('customer')->user()->id)->where('status',4)->get());

                   if(!Order::where('customer_id',auth()->guard('customer')->user()->id)->where('status',1)->first()){
                    $currentOrder="";
                   }
                   if( sizeof($lastOrder) < 0 ){
                    $lastOrder="";
                   }
            }
        }else{
              $currentOrder='';
              $lastOrder='';
        }
        return [
            'pickUpOffer'    => $storeOffer,
            'discountProduct'=> $discountProduct,
            'newProduct'     => $newProduct,
            'newOffer'       => $newOffer,
            'mostRequest'    => $mostRequest,
            'currentOrder'   => $currentOrder,
            'lastOrder'      => $lastOrder,
           
            
        ];
    }

    
}
