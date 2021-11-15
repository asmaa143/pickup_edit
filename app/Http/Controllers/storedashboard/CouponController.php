<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\DataTables\CouponDataTable;
use App\Models\Store;
class CouponController extends Controller
{
    public function index(CouponDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.coupons.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        return view("storedashboard.coupons.create",compact("store"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();

     
        
         $data["code"] = $request->code;
         $data["start_date"] = Carbon::now();
         $data["minimum"] = $request->minimum;
         $data["maximum"] = $request->maximum;
         $data["end_date"] = $request->end_date;
         $data["value"] = $request->value;
         $data["is_percentage"] = $request->is_percentage;
         $data["store_id"] = $store->id;
         $coupon = Coupon::create($data);
     return redirect()->route("coupons.index");
    
    }

   
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $coupon = Coupon::where("id",$id)->first();
        return view("storedashboard.coupons.edit",compact("store","coupon"));
    }

   
    public function update(Request $request, $id)
    {
        $store = Store::where("id",auth()->user()->store_id)->first();
        $coupon = Coupon::where("id",$id)->first();
       
        $data["code"] = $request->code;
        $data["active"] = $request->active;
        $data["minimum"] = $request->minimum;
         $data["maximum"] = $request->maximum;
        $data["end_date"] = $request->end_date;
        $data["value"] = $request->value;
        $data["is_percentage"] = $request->is_percentage;
        $data["store_id"] = $store->id;
         $coupon->update($data);
     return redirect()->route("coupons.index");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::where("id",$id)->first();
        $coupon->delete();
        return response()->json(['status' => true]);
    }public function activecoupon($id){
        $coupon = Coupon::where("id",$id)->first();
    
        if( $coupon->active == 1){
            $coupon->active = 0;
            $coupon->save();
        }elseif( $coupon->active == 0){
            $coupon->active =  1;
            $coupon->save();
        }
    
     
        return response()->json(['status' => true]);
    }
}

