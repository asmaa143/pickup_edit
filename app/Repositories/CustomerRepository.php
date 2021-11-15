<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Http\Requests\TravelRequest;
use App\Interfaces\CustomerInterface;
use App\traits\ResponseAPI;
use DB;
use Carbon\Carbon;
use LaravelLocalization;
use DateTime;
use Illuminate\Support\Facades\Validator;
//Models
use App\Models\Customer;
use App\Models\Store;
use App\Models\Category;
use App\Models\Adds;
use App\Models\StoreOffer;
use App\Models\Product;
use App\Models\FavoriteProduct;
use App\Models\ProductRate;
use App\Models\StoreLanguage;
use App\Models\Tag;
use App\Models\ProductTranslation;
use App\Models\ProductTag;
use App\Models\CategoryTranslation;
use App\Models\Cart;
use App\Models\CartProductExtra;
use App\Models\CartProductExtradetails;
use App\Models\Discount;
use App\Models\ExtraDetail;
use App\Models\CouponStore;
use App\Models\CustomerCoupon;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderHasProduct;
use App\Models\OrderProductHasExtra;
use App\Models\OrderProductHasExtradetails;
use App\Models\OrderRate;
use App\Models\Setting;
//Resource
use App\Http\Resources\UserResource;
use App\Http\Resources\LanguageResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\AddsResource;
use App\Http\Resources\IndexResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryProductStoreResource;
use App\Http\Resources\DiscountProductTabResource;
use App\Http\Resources\NewProductTabResource;
use App\Http\Resources\RateProductResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\CartResource;
use App\Http\Resources\CouponStoreResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\CustomerAddressResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\OfferProductTabResource;
//Facades
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


class CustomerRepository implements CustomerInterface
{
    


    use ResponseAPI;

    public function fetch_languages(Request $request){
        try{

        $storeId =$this->check_store($request);
        $data=LanguageResource::collection(StoreLanguage::where('store_id',$storeId)->get());
        return $this->success("language Store",  LanguageResource::collection($data));
        }catch(\Exception $e) {
         return response()->json(['status'=>false,'message'=>"someThing error in fetch_languages function"],422);
        }
        

    }


     public function fetch_settings(Request $request){
        try{

        $storeId =$this->check_store($request);
        $data=SettingResource::collection(Setting::first());
        return $this->success("Setting Store",  SettingResource::collection($data));
        }catch(\Exception $e) {
         return response()->json(['status'=>false,'message'=>"someThing error in fetch_settings function"],422);
        }
        

    }
    public function signup(Request $request)
    {
        try {
               $validator = Validator::make($request->all(), [
                    'phone' => 'required',
                    'password' => 'required|string|min:6',
                    'name' => 'required',

                ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }

               

                $storeId =$this->check_store($request);
                if(Customer::where('phone',$request->phone)->where('store_id',$storeId)->first()){
                 return response()->json(['message'=>"user Insert Before"],422);

                }
                $request['password'] = Hash::make($request['password']);

                if($request->device_token){
                    $token=$request->device_token;
                }else{
                    $token=null;
                }

                 if($request->device_id){
                    $device_id=$request->device_id;
                }else{
                    $device_id=null;
                }

                 if($request->device_type){
                    $device_type=$request->device_type;
                }else{
                    $device_type=null;
                }
            $data=Customer::create([
                    'store_id'=>$storeId,
                    'name'=>$request->name,
                    'phone'=>$request->phone,
                    'password'=>$request->password,
                    'device_token'=>$token,
                    'device_id'=>$device_id,
                    'device_type'=>$device_type,

            ]);
            
            return $this->success("userInformation", new UserResource($data));
        } catch(\Exception $e) {
                return response()->json(['status'=>false,'message'=>"error in signup function"],400);
        }
    }

   public function login(Request $request){

     $validator = Validator::make($request->all(), [
            'phone' => 'required|',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }

        $storeId =$this->check_store($request);
        $user = Customer::where('phone', $request->phone)->where('store_id',$storeId)->first();
        if ($user == null)
        $user = Customer::where('phone', '+2' . $request->phone)->where('store_id',$storeId)->first();
                if ($user) {
                    if (Hash::check($request->password, $user->password)) {
                        if($request->device_id){
                             $user->device_id=$request->device_id;
                        }
                        if($request->device_type){
                             $user->device_id=$request->device_id;
                        }
                        $user->save();
                       return $this->success("login is done", new UserResource($user));
                    } else {
                        $response = ["message" => "Password mismatch"];
                        return response($response, 422);
                    }
                } else {
                    $response = ["message" => 'customer does not exist'];
                    return response($response, 422);
                }

   }

   public  function  phone_verify(Request $request){

        try {
        $storeId =$this->check_store($request);
        $user = Customer::where('id',auth()->user()->id)->where('store_id',$storeId)->first();

                 if($user){
                     $user->phone_verify=1;
                     $user->save();
                     return $this->success("phone verified ", new UserResource($user));

                  } else {
                    $response = ['status'=>false,"message" => 'customer does not exist'];
                        return response($response, 422);
                  }


        } catch(\Exception $e) {
                return response()->json(['status'=>false,'message'=>"error in phone_verify function"],400);
        }

   }

   public function check_phone(Request $request){
         try {
             $validator = Validator::make($request->all(), [
            'phone' => 'required|',
             ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }
               $storeId =$this->check_store($request);
                $user = Customer::where('phone',$request->phone)->where('store_id',$storeId)->first();
                  if($user){
                     return $this->success("phone found ", true);
                  } else {
                    $response = ['status'=>false,"message" => 'phone does not exist'];
                        return response($response, 422);
                  }
         } catch(\Exception $e) {
                return response()->json(['status'=>false,'message'=>"error in check_phone function"],400);
        }

   }

   public function fetch_my_locations(Request $request){

    try{
        $address= CustomerAddress::where('customer_id',auth()->user()->id)->where('active',1)->orderby('id','desc')->get();
        return $this->success('address',   CustomerAddressResource::collection($address));
    }catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>"error in fetch_my_locations function"],400);

    }
   }

   public function reset_password(Request $request){
        try{

                 $validator = Validator::make($request->all(), [
                'phone' => 'required|',
                'password' => 'required|string|min:6',

                 ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }
                $storeId =$this->check_store($request);
                $user = Customer::where('phone',$request->phone)->where('store_id',$storeId)->first();
                if($user){
                     $user->password = Hash::make($request->password);
                     $user->save();
                     return $this->success("reset password ", new UserResource($user));

                }else {
                    $response = ["message" => 'user does not exist'];
                        return response($response, 422);
                }

        } catch(\Exception $e) {
        return response()->json(['status'=>false,'message'=>"error in reset_password function"],400);
        }
   }

   public function change_password(Request $request){
        try{
             $validator = Validator::make($request->all(), [
              'old_password' => 'required|string|min:6',
              'new_password' => 'required|string|min:6',

             ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }
            $old_password = $request->old_password;
            $new_password = $request->new_password;


            if (!Hash::check($old_password, auth()->user()->password)) {
                return response()->json(['status'=>false,'message' => 'password not correct'], 401);
            } else {
                $request->user()->fill(['password' => Hash::make($new_password)])->save();
                return response()->json(['status'=>true,'message' => 'change password done']);

            }
        }catch(\Exception $e) {
        return response()->json(['status'=>false,'message'=>"error in change_password function"],400);
        }
   }
   
   public function categories(Request $request){

        try{

                $storeId =$this->check_store($request);
                     $paginate=15;
                     if($request->paginate){
                      $paginate=$request->paginate;
                     }
                $category=Category::where('store_id',$storeId)->paginate($paginate);
                return $this->success("category resource ", CategoryResource::collection($category));

         }catch(\Exception $e) {
           return response()->json(['status'=>false,'message'=>"error in categories function"],400);
         }
   }

   public function adds(Request $request){
       try{
                $storeId =$this->check_store($request);
                $adds=Adds::where('store_id',$storeId)->get();
                return $this->success('adds resource',AddsResource::collection($adds));
        }catch(\Exception $e) {
          return response()->json(['status'=>false,'message'=>"error in adds function"],400);
        }
   }

   public function pickup_adds(Request $request){
        try{
                $storeId =$this->check_store($request);
                $storeOffer=StoreOffer::where('store_id',$storeId)->get();
                return $this->success('adds resource',StoreOfferResource::collection($storeOffer));

        }catch(\Exception $e) {
          return response()->json(['status'=>false,'message'=>"error in pickup_adds function"],400);
        }
   }

   public function index(Request $request ){
        try{
             return $this->success('index',new IndexResource(null));
        }catch(\Exception $e) {
             return response()->json(['status'=>false,'message'=>"error in index function"],400);
        }

   }

   public function indexAll(Request $request){
    try{
        $storeId =$this->check_store($request);

        if($request->type==0){
              $data = Product::where('store_id',$storeId)
                ->join('discounts', 'discounts.product_id', '=', 'products.id')
                ->select('products.*')
                ->orderBy('id', 'desc')
                ->get();
        }elseif($request->type==1){
            $data=Product::where('store_id',$storeId)->orderby('id','desc')->where('is_offer',0)->paginate(20);
        }elseif($request->type==2){
            $data=Product::where('store_id',$storeId)->orderby('id','desc')->where('is_offer',1)->paginate(20);
        }else{
            $data=  Product::where('store_id',$storeId)->orderby('id','desc')->paginate(10);
        }

        if( sizeof($data) < 0 ){
                 $data="";
        }
             return $this->success('indexAll', ProductResource::collection($data));

    }catch(\Exception $e) {
             return response()->json(['status'=>false,'message'=>"error in indexAll function"],400);
    }
   }


   public function fetch_seller_menu(Request $request){
    try{
        //dd($request->ordered_by);
        $storeId =$this->check_store($request);
        ############################################################################################
        $newProduct=  Product::where('store_id',$storeId)->orderby('id','desc')->take(1)->get();
        $newProduct= NewProductTabResource::collection($newProduct);
        #############################################################################################
        $offerProduct=  Product::where('store_id',$storeId)->orderby('id','desc')->take(1)->get();
        $offerProduct= OfferProductTabResource::collection($newProduct);
        #############################################################################################
         $discount = Product::where('store_id',$storeId)
                ->join('discounts', 'discounts.product_id', '=', 'products.id')
                ->select('products.*')
                ->orderBy('id', 'desc')->take(1)
                ->get();
        $discountProduct=  DiscountProductTabResource::collection($discount);
        #######################################################################################

        $data=CategoryProductStoreResource::collection(Category::where('store_id',$storeId)->orderby('id','desc')->get());
        ######################################################################################
        $resultData=collect();

        $resultData=$resultData->merge($offerProduct);
        $resultData=$resultData->merge($discountProduct);
        $resultData=$resultData->merge($newProduct);
        $resultData=$resultData->merge($data);
             return $this->success('products', $resultData);

    }catch(\Exception $e) {
        return response()->json(['status'=>false,'message'=>"error in products function"],400);
    }
}

   

   public function get_product(Request $request){
    try{
          $storeId =$this->check_store($request);
        ############################################################################################
        $product=  new ProductResource(Product::where('store_id',$storeId)->where('id',$request->product_id)->orderby('id','desc')->first());
        ########################################################################################
             return $this->success('productDetails', $product);

    }catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>"error in get_product function"],400);
    }
   }


   public function customer_like_product(Request $request){
        try{
          $storeId =$this->check_store($request);

             $validator = Validator::make($request->all(), [
            'product_id' => 'required|',
            'like' => 'required|',

        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }

        auth()->user()->id;
        $like = FavoriteProduct::where('customer_id', auth()->user()->id)->where('product_id', $request['product_id'])->orderby('id', 'desc')->where('store_id',$storeId)->first();
        if (is_null($like)) {
            if ($request->like == "true") {
                FavoriteProduct::create([
                    'product_id' => $request->product_id,
                    'customer_id' => auth()->user()->id,
                    'store_id' => $storeId,
                ]);
                return response()->json(['status'=>true,'message' => 'like']);
            } else {
                return response()->json(['status'=>true,'message' => 'do like first']);
            }
        } else {
            if ($request->like == "true") {
                return response()->json(['status'=>true,'message' => 'you like it']);
            } else {
                $like->delete();
                return response()->json(['status'=>true,'message' => 'dislike']);
            }
        }


        }catch(\Exception $e){
          return response()->json(['status'=>false,'message'=>"error in customer_like_product function"],400);
        }
   }


   public function likes(Request $request){
    try{
          $storeId =$this->check_store($request);

         $customer = auth()->user();
        $productsFinal = collect();
        foreach ($customer->customerLikesProducts()->orderby('id', 'desc')->where('store_id',$storeId)->pluck('product_id') as $product) {
            $product = Product::find($product);
            $productsFinal->push($product);
        }

             return $this->success('all likes', ProductResource::collection($productsFinal));
   
    }catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>"error in likes function"],400);
    }
   }

   public function  customer_rate_product(Request $request){
    try{
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'rate' => 'required',


        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }
          $storeId =$this->check_store($request);

        $rate=ProductRate::create([
            'product_id'  => $request['product_id'],
            'rate'        => $request['rate'],
            'review'      => $request['review'],
            'customer_id' => auth()->user()->id,
            'store_id'    =>  $storeId,
        ]);

             return $this->success('rateProduct', new RateProductResource($rate));

    }catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>"error in customer_rate_product function"],400);
    }
   } 


   public function getRateproduct(Request $request){
    try{
          $storeId =$this->check_store($request);
          $count = ProductRate::where('product_id', $request->product_id)->count();
        if ($count <> 0) {
            $productratesum = ProductRate::where('product_id', $request->product_id)->sum('rate') / $count;
        } else {
            $productratesum = 0;
        }

        $ProductRate = ProductRate::where('product_id', $request->product_id)->orderby('id', 'desc')->where('customer_id', '!=', auth()->user()->id)->get();
        $CustomerRate2 = ProductRate::where('product_id', $request->product_id)->where('customer_id', auth()->user()->id)->where('store_id',$storeId)->orderby('id', 'desc')->first();
            if( $CustomerRate2){
                $ProductRate->prepend($CustomerRate2);
            }


        return response()->json(['status'=>true,'message'=>'rates','data' => RateProductResource::collection($ProductRate), 'average_rate' => $productratesum]);

    }catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>"error in getRateproduct function"],400);
    }
   }

   public function ExpectWord(Request $request){
    try{

           $storeId =$this->check_store($request);
           $ProductTag = TagResource::collection(Tag::where('store_id',$storeId)->get());
          return $this->success('ExpectWord', $ProductTag);
    }catch(\Exception $e){
          return response()->json(['status'=>false,'message'=>"error in ExpectWord function"],400);
    }

   }

   public function search(Request $request){
    try{
           $storeId =$this->check_store($request);
           if($request->word){
                $productsId = ProductTranslation::where('title', 'LIKE', '%' . (string)$request->word . '%')->pluck('product_id');
                $products = ProductResource::collection(Product::whereIn('id',$productsId)->where('store_id',$storeId)->get());
           }elseif($request->tag_id){
                $productsId =ProductTag::where('tag_id',$request->tag_id)->pluck('product_id');
                $products = ProductResource::collection(Product::whereIn('id',$productsId)->where('store_id',$storeId)->get());
           }elseif($request->category){
                 $categoryId = CategoryTranslation::where('title', 'LIKE', '%' . (string)$request->category . '%')->pluck('category_id');
                $products = CategoryResource::collection(Category::whereIn('id',$categoryId)->where('store_id',$storeId)->get());
           }

          return $this->success('serach', $products);



    }catch(\Exception $e){
          return response()->json(['status'=>false,'message'=>"error in search function"],400);
    }
   }


   ##########################################Cart#############################################################


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
        if ($cart = Cart::where('product_id', $request->product_id)->where('customer_id', auth()->user()->id)->where('store_id',$storeId)->first()) {
            $cart->quantity = $cart->quantity + $quantity;
            $cart->save();
        }else{

                
                $cart = Cart::create([
                    'product_id' => $request->product_id,
                    'quantity' => 1,
                    'customer_id' => auth()->user()->id,
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
             return response()->json(['status'=>false,'message'=>"error in postCart function"],400);

    }


   }


   public function getCart(Request $request){

        try{
               $storeId =$this->check_store($request);
               $cart= Cart::where('customer_id',auth()->user()->id)->first();
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
               $cart= Cart::where('customer_id',auth()->user()->id)->first();

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
               $cart= Cart::where('customer_id',auth()->user()->id)->first();
              
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
            return response()->json(["status"=>true,'message' => 'deleted']);

        }else{
            return response()->json(['status' => false, "message"=>"false"]);

        }
        }catch(\Exception $e){return response()->json(['message'=>"deleteCart"],400);}

    }



    public function coupon(Request $request){
        try{
            $validator = Validator::make($request->all(), [
            'code' => 'required',

        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()->first()], 422);
        }
       $storeId =$this->check_store($request);

       $voucher= CouponStore::where('code',$request['code'])->where('store_id',$storeId)->first();
       if( $voucher){
        return $this->success('couponStore',  new CouponStoreResource($voucher));
       }else{
        return response()->json(['status' => false,'message'=>'there no coupon ']);

       }
        }catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>"error in coupon function"],400);}
    }


    



###############################################ORDER#######################################################

    public function order(Request $request){

        try{

               $validator = Validator::make($request->all(), [
                'payment_method' => 'required',
                'type' => 'required',
               

              ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }
               $storeId =$this->check_store($request);

              $cart=Cart::where('customer_id',auth()->user()->id)->where('store_id',$storeId)->get();
                   if(sizeof($cart) == 0){
                    return response()->json(['status'=>false,'message' =>'الكارت فارغه'], 401);

                   }

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
                            // $taxPrice=0;
                             $totalprice=( $priceOfProductAll + $allprice + $deliveryPrice  );

                              if($request->code){
                                $coupon=$this->getVoucher($request ,$totalprice);
                                $finalPrice=$coupon[0];
                                $code=$coupon[1];
                                }else{
                                $finalPrice=$totalprice;
                                $code=null;
                              }
                              if($request->lat){
                              $addressId=$this->getAddressId($request);
                              }else{
                               $addressId= CustomerAddress::where('customer_id',auth()->user()->id)->where('active',1)->orderby('id','desc')->first();
                               if(!$addressId){
                                return response()->json(['status'=>false,'message'=>'we dont have any address for you add address to make order'],422);
                               }
                              }
                               $date = Carbon::now()->format('Y-m-d');

                                $order = Order::create([

                                    'customer_id' => auth()->user()->id,
                                    'voucher_id' => $code,
                                    'driver_price' =>  $deliveryPrice,
                                    'final_price' => $finalPrice,
                                    'payment_method' => $request->payment_method,
                                    'address_id' => $addressId,
                                    'date' => $date,
                                    'type' => $request->order_type,
                                    'notes'=>$request->notes,
                                    'store_id'=>$storeId,
                                    'status'=>0,
                                    'serial_number'=>$this->generateBarcodeNumber(),
                                    'branch_id'=>$request->resturant_branch_id,



                                ]);

                                 if($request->car_type){
                                    OrderCar::create([
                                        'car_type'=>$request->car_type,
                                        'car_number'=>$request->car_number,
                                        'car_color'=>$request->car_color,
                                        'store_id'=>$storeId,
                                        'order_id'=>$order->id,
                                    ]);
                                }
                                ###################################################


                   foreach ($cart as  $cartProduct) {
                    $discount=Discount::where('product_id',$cartProduct->product_id)->orderby('id','desc')->first();
                    $product=Product::find($cartProduct->product_id);
                        if ($discount <> null) {
                         $priceOfProduct = $product->default_price - ($product->default_price * ($discount->value / 100));
                         }else{
                          $priceOfProduct=$product->default_price;  
                         }
                          $priceOfQuantityProduct= $priceOfProduct *$cartProduct->quantity;

                          $extras=  CartProductExtra::where('cart_id',$cartProduct['id'])->get();
                          $price[]=$this->getProductExtraPrice($extras);
                          


                                $allpriceOfProduct=array_sum($price)+$priceOfQuantityProduct;


                                $OrderHasProduct = OrderHasProduct::create([
                                    'order_id'   => $order->id,
                                    'product_id' => $cartProduct->product_id,
                                    'quantity'   => $cartProduct->quantity,
                                    'price'      => $allpriceOfProduct,
                                ]);

                          $extras=  CartProductExtra::where('cart_id',$cartProduct['id'])->get();
                          if(sizeof($extras)>0){
                            foreach($extras as $extra){
                              $OrderProductHasExtra=   OrderProductHasExtra::create([
                                    'OrderHasProduct_id' => $OrderHasProduct['id'],
                                    'extra_id' => $extra->extra_id,
                                ]);
                            }

                          }

                           $extradetails=CartProductExtradetails::where('cart_id',$cartProduct->id)->where('extra_id',$extra->extra_id)->get();
                             if(sizeof($extradetails)>0){
                                foreach($extradetails as $extradetail){
                                 OrderProductHasExtradetails::create([
                                    'OrderProductHasExtra_id'=>$OrderProductHasExtra->id,
                                    'extradetail_id'=>$extradetail->id,
                                 ]);


                                }


                            }


                                

                }




               }

            return $this->success('order',  new OrderResource($order));
        }catch(\Exception $e){
           
            return response()->json(['status'=>false,'message'=>"someThing error in order function"],422);}
    
    }

    public function reorder(Request $request){

        try{
        $order = Order::where('id', $request['order_id'])->first();
        if (!$order)
        return response()->json(['status'=>false,'message' => 'لايوجد اوردر']);

        $typesave1 = $order->replicate();
        $typesave1->status = 0;
        $typesave1->serial_number = $this->generateBarcodeNumber();
        $typesave1->save();

        $OrderHasProduct = OrderHasProduct::where('order_id', $request['order_id'])->get();
        foreach ($OrderHasProduct as $OrderHasP) {
            $OrderHasProduct = OrderHasProduct::where('order_id', $request['order_id'])->where('id', $OrderHasP['id'])->first();
            $typesave2 = $OrderHasP->replicate();
            $typesave2->order_id = $typesave1->id;
            $typesave2->save();
            $newExtra = OrderProductHasExtra::where('OrderHasProduct_id', $OrderHasP['id'])->get();
            foreach ($newExtra as $newEx) {
                    $newExtra = OrderProductHasExtra::where('id',$newEx->id)->where('OrderHasProduct_id', $OrderHasP['id'])->first();
                     $typesave3 = $newEx->replicate();
                     $typesave3->OrderHasProduct_id = $typesave2->id;
                     $typesave3->save();
#####################################ExtraDetails##################################################
                     $extradetails=OrderProductHasExtradetails::where('OrderProductHasExtra_id',$newEx->id)->get();
                    foreach ($extradetails as $extradetal) {
                     $extradetails=OrderProductHasExtradetails::where('id',$extradetal->id)->where('OrderProductHasExtra_id',$newEx->id)->first();
                      $typesave4 = $extradetal->replicate();
                      $typesave4->OrderProductHasExtra_id = $typesave3->id;
                      $typesave4->save();

                    }

  ##########################################################################################


            }
        }


        return $this->success('order',  new OrderResource($typesave1));

        }catch(\Exception $e ){
            return response()->json(['status'=>false,'message'=>"someThing error in reorder function"],422);}
        }
    


public function rateOrder(Request $request){
    try{
              $validator = Validator::make($request->all(), [
                'rate' => 'required',
                'message' => 'required',
              ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }
               $storeId =$this->check_store($request);

                $rate=OrderRate::create([

                    'rate'=>$request->rate,
                    'comment'=>$request->comment,
                    'store_id'=>$storeId,
                    'customer_id'=>auth()->user()->id,

                ]);

        return $this->success('orderRate',$rate);


    }catch(\Exception $e){ 
        return response()->json(['status'=>false,'message'=>"someThing error in rateOrder function"],422);}
    
}

public function getOrders(Request $request){
    try{
        $storeId =$this->check_store($request);
        $customer = auth()->user()->id;
        $resultData = collect();
        $resultData2 = collect();
        $countNew = Order::where('customer_id', $customer)->where('store_id',$storeId)->orderby('id', 'desc')->where('status', '=', 0)->count();
        $orderNew1 = Order::where('customer_id', $customer)->where('store_id',$storeId)->orderby('id', 'desc')->where('status', '=', 0)->get();
        $orderNew2 = Order::where('customer_id', $customer)->where('store_id',$storeId)->orderby('id', 'desc')->where('status', '=', 1)->get();
        $orderNew3 = Order::where('customer_id', $customer)->where('store_id',$storeId)->orderby('id', 'desc')->where('status', '=', 2)->get();
        $resultData = $resultData->merge($orderNew1);
        $resultData = $resultData->merge($orderNew2);
        $resultData = $resultData->merge($orderNew3);
        $resultData = $resultData->sort(function ($a, $b) {
            return $b->id - $a->id;
        });

         ################################################################################################################

         $countPrevious = Order::where('customer_id', $customer)->where('store_id',$storeId)->orderby('id', 'desc')->where('status', '=', 3)->count();
        $orderPrevious1 = Order::where('customer_id', $customer)->where('store_id',$storeId)->orderby('id', 'desc')->where('status', '=', 3)->get();
        $orderPrevious2 = Order::where('customer_id', $customer)->where('store_id',$storeId)->orderby('id', 'desc')->where('status', '=', 4)->get();


        $resultData2 = $resultData2->merge($orderPrevious1);
        $resultData2 = $resultData2->merge($orderPrevious2);
        $resultData2 = $resultData2->sort(function ($a, $b) {
            return $b->id - $a->id;
        });
        $data["ordernew"]= OrderResource::collection($resultData);
        $data["orderPrevious"]= OrderResource::collection($resultData2);
        return $this->success('orderRate',  $data);

    }catch(\Exception $e){  
        return response()->json(['status'=>false,'message'=>"someThing error in getOrders function"],422);}
    
}

public function cancel_order(Request $request){
    try{
         $validator = Validator::make($request->all(), [
                'order_id' => 'required',
              ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }
        $storeId =$this->check_store($request);

        Order::where('customer_id',auth()->user()->id)->where('store_id',$storeId)->where('id',$request->order_id)->update([
            'status'=>4,
        ]);
        return response()->json(['status'=>true,'message'=>"cancel orderd"],200);

    }catch(\Exception $e){    
        return response()->json(['status'=>false,'message'=>"someThing error in cancel_order function"],422);}
    
}


public function getVoucher(Request $request ,$totalprice){
    try{   



       $storeId =$this->check_store($request);
       $coupon= CouponStore::where('code',$request['code'])->first();
       if($voucher){ 
        if($voucher->is_percentage==0){

            if($totalprice >= $coupon->minimum){
               $CustomerCoupon=CustomerCoupon::where('customer_id',auth()->user()->id)->where('coupon_id', $coupon->id)->where('store_id',$storeId)->where('customer_phone',auth()->user()->phone)->first();
               if($CustomerCoupon == null){
                $CustomerCoupon=CustomerCoupon::where('customer_phone',$request->phone)->orwhere('device_id',$request->device_id)->first();
               }
               
                if(!$CustomerCoupon){
                   $finalPrice= ($totalprice - $coupon->value);
                      CustomerCoupon::create([
                        'store_id'=>$storeId,
                        'customer_id'=>auth()->user()->id,
                        'customer_phone'=>auth()->user()->phone,
                        'coupon_id'=>$coupon->id,
                        'device_id'=>$request->device_id,
                       ]);
                       $code=$request->code;
                       $getVoucher[]=$finalPrice;
                       $getVoucher[]=$code;
                       return  $getVoucher  ;
                 } 
            } 
        }else{
            if($totalprice <= $coupon->maximum){
               $CustomerCoupon=CustomerCoupon::where('customer_id',auth()->user()->id)->where('coupon_id', $coupon->id)->where('store_id',$storeId)->where('customer_phone',auth()->user()->phone)->first();
               if($CustomerCoupon == null){
                $CustomerCoupon=CustomerCoupon::where('customer_phone',$request->phone)->orwhere('device_id',$request->device_id)->first();
               }
               
                if(!$CustomerCoupon){
                   $finalPrice= ($totalprice - ($totalprice * ($coupon->value / 100)));
                      CustomerCoupon::create([
                        'store_id'=>$storeId,
                        'customer_id'=>auth()->user()->id,
                        'customer_phone'=>auth()->user()->phone,
                        'coupon_id'=>$coupon->id,
                        'device_id'=>$request->device_id,
                       ]);
                       $code=$request->code;
                       $getVoucher[]=$finalPrice;
                       $getVoucher[]=$code;
                       return  $getVoucher  ;
                 } 
            } 
        }

       }else{
        return response()->json(['message' => 'false'],400);

       }
         }catch(\Exception $e){return response()->json(['status'=>false,'message'=>"someThing error in getVoucher function"]);}

    }


public function getAddressId(Request $request){
    try{
       $storeId =$this->check_store($request);

        CustomerAddress::where('customer_id',auth()->user()->id)->update([
        'active'=>0,
        ]);
        $addressId=CustomerAddress::create([
            'address'=>$request->address,
            'lat'=>$request->lat,
            'lng'=>$request->lng,
            'building_name'=>$request->building_name,
            'flat_number'=>$request->flat_number,
            'floor_number'=>$request->floor_number,
            'customer_id'=>auth()->user()->id,
            'phone'=>$request->client_phone,
            'details'=>$request->details,
            'active'=>1,
        ]);

       
        return  $addressId->id;
    }catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>"someThing error in getAddressId function"],400);}

}

public function getProductExtraPrice($extras){

    try{
        if( sizeof($extras)>0){
             foreach( $extras as $extra) {
                $extradetails=CartProductExtradetails::where('cart_id',$cartProduct->id)->where('extra_id',$extra->extra_id)->get();
                if(sizeof($extradetails)>0){
                    foreach($extradetails as $extradetail){
                     $extraprice=ExtraDetail::find( $extradetail->extradetail_id);
                     $price[]=$extraprice['price'];

                    }

                }else{
                     $price[]=0;

                }


             }
             return $price;
        }else{
            return $price=0;
        }

    }catch(\Exception $e){return response()->json(['status'=>false,'message'=>"someThing error in getProductExtraPrice function"],400);}

}

public function postAddress(Request $request){
    try{

        $validator = Validator::make($request->all(), [
                    'address' => 'required',
                    'lat' => 'required',
                    'lng' => 'required',
                    

                ]);
                if ($validator->fails()) {
                    return response(['message' => $validator->errors()->first()], 422);
                }

         CustomerAddress::where('customer_id',auth()->user()->id)->update([
           'active'=>0,
         ]);
        $address=CustomerAddress::create([
            'address'=>$request->address,
            'lat'=>$request->lat,
            'lng'=>$request->lng,
            'building_name'=>$request->building_name,
            'flat_number'=>$request->flat_number,
            'floor_number'=>$request->floor_number,
            'customer_id'=>auth()->user()->id,
            'phone'=>$request->phone,
            'details'=>$request->details,
            'active'=>1,
        ]);

        return $this->success('address',  new CustomerAddressResource($address));


    }catch(\Exception $e){
        return response()->json(['status'=>false,'message'=>"someThing error in postAddress function"],400);}
}

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