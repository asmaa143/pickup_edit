<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Http\Requests\TravelRequest;
use App\Interfaces\CallCenterInterface;
use App\traits\ResponseCallCenterAPI;
use DB;
use Carbon\Carbon;
use LaravelLocalization;
use DateTime;
use Illuminate\Support\Facades\Validator;
//Models
use App\Models\CallCenter;
use App\Models\Store;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartProductExtra;
use App\Models\CartProductExtradetails;
use App\Models\CallCenterOrderAdress;


//Resource
use App\Http\Resources\CallCenter\CallCenterResource;
use App\Http\Resources\CallCenter\CategoryResource;
use App\Http\Resources\CallCenter\ProductResource;
use App\Http\Resources\CallCenter\CartResource;


//Facades
use Illuminate\Support\Facades\Hash;


class CallCenterRepository implements CallCenterInterface
{
    


    use ResponseCallCenterAPI;

    
   public function login(Request $request){

     $validator = Validator::make($request->all(), [
            'phone' => 'required|',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }

        $storeId =$this->check_store($request);
        $user = CallCenter::where('phone', $request->phone)->where('store_id',$storeId)->first();
        if ($user == null)
        $user = CallCenter::where('phone', '+2' . $request->phone)->where('store_id',$storeId)->first();
                if ($user) {
                    if (Hash::check($request->password, $user->password)) {
                        if($request->device_id){
                             $user->device_id=$request->device_id;
                        }
                        if($request->device_type){
                             $user->device_id=$request->device_id;
                        }
                        $user->save();
                       return $this->success("login", new CallCenterResource($user));
                    } else {
                        $response = ["message" => "Password mismatch"];
                        return response($response, 422);
                    }
                } else {
                    $response = ["message" => 'CallCenter does not exist'];
                    return response($response, 422);
                }

   }

   public function categories(Request $request){

     try{

                $storeId =$this->check_store($request);
                $category=Category::where('store_id',$storeId)->get();
                return $this->success("categories", CategoryResource::collection($category));

         }catch(\Exception $e) {
           return response()->json(['status'=>false,'message'=>"error in categories function"],400);
         }
   }

   public function products(Request $request){

    try{
         $validator = Validator::make($request->all(), [
                    'category_id' => 'required',
                
                  ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }
        $storeId =$this->check_store($request);
        $products=Product::where('store_id',$storeId)->where('category_id',$request->category_id)->get();
        return $this->success("products", ProductResource::collection($products));


    }catch(\Exception $e) {
           return response()->json(['status'=>false,'message'=>"error in products function"],400);
    }
   }


public function postCart(Request $request){

    try{
     $validator = Validator::make($request->all(), [
            'product_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }
           $storeId =$this->check_store($request);
               if($request->quantity){
                   $quantity=$request->quantity;
                 }else{
                   $quantity=1;
                 }
        if ($cart = Cart::where('product_id', $request->product_id)->where('callcenter_id', auth()->user()->id)->where('store_id',$storeId)->first()) {
            $cart->quantity = $cart->quantity + $quantity;
            $cart->save();
        }else{

                
                $cart = Cart::create([
                    'product_id' => $request->product_id,
                    'quantity' => 1,
                    'callcenter_id' => auth()->user()->id,
                    'store_id'=>$storeId,
                    'notes'=>$request->notes,
                ]);

                if($request->extras){
                  $extras=json_decode($request->extras, true);
                    foreach ($extras as $ex) {
                           $CartProductExtra=CartProductExtra::create([
                              'extra_id'=>$ex['id'],
                              'cart_id'=> $cart['id'],
                           ]); 
                             // $extrasDetails=json_decode($ex['extrasDetails'], true);
                                foreach ($ex['extrasDetails'] as $extra) {
                                   
                                   CartProductExtradetails::create([
                                      'extradetail_id'=>$extra['id'],
                                      'extra_id'=> $ex['id'],
                                      'cart_id'=> $cart['id'],
                                      'cartproductextra_id'=>$CartProductExtra['id'],
                                   ]);   
                                }
         
                    }
                }

                    
                
        }
              return $this->success('Cart',  new CartResource($cart));



    }catch(\Exception $e){
        return $e;
             return response()->json(['status'=>false,'message'=>"error in postCart function"],400);

    }
}




 public function getCart(Request $request){

        try{
               $storeId =$this->check_store($request);
               $cart= Cart::where('callcenter_id',auth()->user()->id)->first();
               if(is_null($cart)){
                return response()->json(['status'=>false,'message'=>"empty cart"]);

               }
              return $this->success('Cart',  new CartResource($cart));
        }catch(\Exception $e){
              return response()->json(['status'=>false,'message'=>"error in getCart function"],400);

        }
   }

   public function increaseCart(Request $request){

    try{
         $validator = Validator::make($request->all(), [
            'cart_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }
               $storeId =$this->check_store($request);
               $cart= Cart::where('callcenter_id',auth()->user()->id)->first();

               ###############################increaseQuantity############
                $cartQuantity=Cart::find($request->cart_id);
                 if( $cartQuantity == null){
                   return response()->json(['status'=>false,'message'=>'not found']);
                 }
                $cartQuantity->quantity=$cartQuantity->quantity+1;
                $cartQuantity->save();
               ###################################################
              return $this->success('Cart',  new CartResource($cart));
    }catch(\Exception $e){
              return response()->json(['status'=>false,'message'=>"error in increaseCart function"],400);
    }
   }

    public function decreaseCart(Request $request){

    try{
         $validator = Validator::make($request->all(), [
            'cart_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }
               $storeId =$this->check_store($request);
               $cart= Cart::where('callcenter_id',auth()->user()->id)->first();
              
               ###############################increaseQuantity############
                $cartQuantity=Cart::find($request->cart_id);
                 if( $cartQuantity == null){
                  return response()->json(['status'=>false,'message'=>'not found']);
                 }
                $cartQuantity->quantity=$cartQuantity->quantity-1;
                $cartQuantity->save();

                 if ($cartQuantity->quantity == 0) {
                   $cartQuantity->delete();
                 }
               ###################################################
              return $this->success('Cart',  new CartResource($cart));
    }catch(\Exception $e){           
              return response()->json(['status'=>false,'message'=>"error in decreaseCart function"],400);
   }

   }


 public function deleteCart(Request $request){

    try{
        $validator = Validator::make($request->all(), [
            'cart_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }

        $cart= Cart::where('id',$request->cart_id)->first();

        if($cart){
            Cart::where('id',$request->cart_id)->delete();           
              return $this->success('cart deleted',$data="");

        }else{
              return $this->success('cart',  $data="not found");

        }
    }catch(\Exception $e){return response()->json(['message'=>"deleteCart"],400);}

    }

    public function postAddress(Request $request){
        try{

              $storeId =$this->check_store($request);

              $DriverOrderAdress=CallCenterOrderAdress::create([

                'store_id'=>$storeId,
                'callcenter_id'=>auth()->user()->id,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'alternate_phone'=>$request->alternate_phone,
                'city'=>$request->city,
                'state'=>$request->state,
                'area'=>$request->area,
                'address'=>$request->address,
                'type_address'=>$request->type_address,
                

              ]);
              return $this->success('address',  $DriverOrderAdress);

        }catch(\Exception $e){
            return response()->json(['message'=>"error in postAddress"],400);

        }

    }
    
    public function getClient(Request $request){
        try{
              $storeId =$this->check_store($request);
              $DriverOrderAdress=CallCenterOrderAdress::where('callcenter_id',auth()->user()->id)->get();
              return $this->success('address',  $DriverOrderAdress);

        }catch(\Exception $e){
            return response()->json(['message'=>"error getClient function "],400);

        }
    }

    public function search_clients(Request $request){

        try{

             $validator = Validator::make($request->all(), [
            'phone' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }
              $DriverOrderAdress = CallCenterOrderAdress::where('phone', 'LIKE', '%' . (string)$request->phone . '%')->orwhere('alternate_phone', 'LIKE', '%' . (string)$request->phone . '%')->get();
              return $this->success('address',  $DriverOrderAdress);

        }catch(\Exception $e){
            return response()->json(['message'=>"error search_Clients function "],400);

        }
    }
























  ##############################################################################################################
   public function check_store(Request $request){
         $storeId=null;
         if($store=Store::where('api_key',$request->header('ApiKey'))->first())
        return $storeId=$store->id;
   }

    function generateBarcodeNumber() {
        $number = mt_rand(100000000, 999999999); // better than rand()
    
        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return generateBarcodeNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
    }
    
    function barcodeNumberExists($number) {
        if(Order::where('serial_number',$number)->exists());
        return Order::where('serial_number',$number)->exists();
    }
}