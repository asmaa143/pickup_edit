<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\OrderProductHasExtra;
use App\Models\OrderProductHasExtradetails;
use App\Models\OrderHasProduct;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Extra;
use App\Models\ExtraDetail;
use App\DataTables\OrderDataTable;
use App\DataTables\OrdertableDataTable;
class OrderController extends Controller
{
    public function addorder(){
        // $arr =[1,2];
        // $arr2 =[3,4];
        // dd(count(array_intersect($arr,$arr2)));
        $store = Store::whereId(auth()->user()->store_id)->first();
        $categories = Category::whereStoreId($store->id)->get();
        return view("storedashboard.orders.create",compact("categories"));
    }public function storeorder(Request $request){
        $finalprice = 0;
        $order = new Order;
        $order->customer_name = $request->name;
        $order->customer_phone = $request->phone;
        $order->payment_method = 'cash';
        $order->type = 'takeaway';
        $order->date = Carbon::now();
        $order->store_id = auth()->user()->store_id;
        $order->save();
       foreach($request->product_id as $productid){
           if($request["count$productid"] != 0){
               $product = Product::whereId($productid)->first();
        $orderproduct = new OrderHasProduct;
        $orderproduct->order_id = $order->id;
        $orderproduct->product_id = $productid;
        $orderproduct->quantity  = $request["count$productid"];
        $orderproduct->price = $product->default_price;
        $orderproduct->save();
        $finalprice +=  $orderproduct->price *$orderproduct->quantity;
        foreach($request->extra_id as $extraid) {
            $extra =Extra::whereId($extraid)->first();
         if(count(array_intersect($extra->extrasdetails->pluck('id')->toArray(),$request->extradetail))){
            $orderextra = new OrderProductHasExtra;
            $orderextra->OrderHasProduct_id = $orderproduct->id;
            $orderextra->extra_id = $extraid;
            $orderextra->save();
            foreach(array_intersect($extra->extrasdetails->pluck('id')->toArray(),$request->extradetail) as $extradetail){
                $extrade = ExtraDetail::whereId($extradetail)->first();
                $orderextradetail = new OrderProductHasExtradetails;
                $orderextradetail->extradetail_id = $extradetail;
                $orderextradetail->OrderProductHasExtra_id = $orderextra->id;
                $orderextradetail->price = $extrade->price;
                $orderextradetail->save();
                $finalprice +=   $orderextradetail->price;
            }
         }
       }
    }
    } $order->final_price = $finalprice;
    $order->save();
    return redirect()->route("invoice")->with(['order' => $order]);
}
    public function storeorder2(Request $request){
        $finalprice = 0;
        $order = new Order;
        $order->customer_name = $request->name;
        $order->customer_phone = $request->phone;
        $order->address_details = $request->address_details;
        $order->type = 'delivery';
        $order->payment_method = 'cash';
        $order->date = Carbon::now();
        $order->store_id = auth()->user()->store_id;
        $order->save();
       foreach($request->product_id as $productid){
           if($request["count$productid"] != 0){
               $product = Product::whereId($productid)->first();
        $orderproduct = new OrderHasProduct;
        $orderproduct->order_id = $order->id;
        $orderproduct->product_id = $productid;
        $orderproduct->quantity  = $request["count$productid"];
        $orderproduct->price = $product->default_price;
        $orderproduct->save();
        $finalprice +=  $orderproduct->price *$orderproduct->quantity;
        foreach($request->extra_id as $extraid) {
            $extra =Extra::whereId($extraid)->first();
         if(count(array_intersect($extra->extrasdetails->pluck('id')->toArray(),$request->extradetail))){
            $orderextra = new OrderProductHasExtra;
            $orderextra->OrderHasProduct_id = $orderproduct->id;
            $orderextra->extra_id = $extraid;
            $orderextra->save();
            foreach(array_intersect($extra->extrasdetails->pluck('id')->toArray(),$request->extradetail) as $extradetail){
                $extrade = ExtraDetail::whereId($extradetail)->first();
                $orderextradetail = new OrderProductHasExtradetails;
                $orderextradetail->extradetail_id = $extradetail;
                $orderextradetail->OrderProductHasExtra_id = $orderextra->id;
                $orderextradetail->price = $extrade->price;
                $orderextradetail->save();
                $finalprice +=   $orderextradetail->price;
            }
         }
       }
    }
    } $order->final_price = $finalprice;
    $order->save();
  return redirect()->route("invoice")->with(['order' => $order]);
    }public function storeorder3(Request $request){
        $finalprice = 0;
        $order = new Order;
        $order->customer_name = $request->name;
        $order->customer_phone = $request->phone;
        $order->table_number = $request->table_number;
        $order->payment_method = 'cash';
        $order->type = 'table';
        $order->date = Carbon::now();
        $order->store_id = auth()->user()->store_id;
        $order->save();
       foreach($request->product_id as $productid){
           if($request["count$productid"] != 0){
               $product = Product::whereId($productid)->first();
        $orderproduct = new OrderHasProduct;
        $orderproduct->order_id = $order->id;
        $orderproduct->product_id = $productid;
        $orderproduct->quantity  = $request["count$productid"];
        $orderproduct->price = $product->default_price;
        $orderproduct->save();
        $finalprice +=  $orderproduct->price *$orderproduct->quantity;
        foreach($request->extra_id as $extraid) {
            $extra =Extra::whereId($extraid)->first();
         if(count(array_intersect($extra->extrasdetails->pluck('id')->toArray(),$request->extradetail))){
            $orderextra = new OrderProductHasExtra;
            $orderextra->OrderHasProduct_id = $orderproduct->id;
            $orderextra->extra_id = $extraid;
            $orderextra->save();
            foreach(array_intersect($extra->extrasdetails->pluck('id')->toArray(),$request->extradetail) as $extradetail){
                $extrade = ExtraDetail::whereId($extradetail)->first();
                $orderextradetail = new OrderProductHasExtradetails;
                $orderextradetail->extradetail_id = $extradetail;
                $orderextradetail->OrderProductHasExtra_id = $orderextra->id;
                $orderextradetail->price = $extrade->price;
                $orderextradetail->save();
                $finalprice +=   $orderextradetail->price;
            }
         }
       }
    }
    }
    $order->final_price = $finalprice;
    $order->save();
  return redirect()->route("invoice")->with(['order' => $order]);
    }
      public function invoice(){
        return view("storedashboard.invoice.index");
    }public function orders(OrderDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.orders.index");
    }public function showorder($id){
        $order = Order::whereId($id)->first();
        return view("storedashboard.orders.showorder",compact("order"));
    }public function ordertable(OrdertableDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.orders.ordertable");
    }
}
