<?php

namespace App\Http\Resources;


use App\Models\Order;
use App\Models\CustomerAddress;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

       

        $OrderProducts = \App\Models\OrderHasProduct::where('order_id', $this->id)->orderby('id', 'desc')->get();
        $delivery = \App\Models\Driver::find($this->driver_id);
        $address=CustomerAddress::where('id',$this->address_id)->where('active',1)->first();
        $price=new OrderPriceResource(Order::find($this->id));
            try{
             $auth=auth()->user()->name;
            }catch(\Exception $e){
              $auth=auth()->guard('customer')->user()->name;  
            };
        return [
            'id' => $this->id,
            'order_number'=>$this->serial_number,
            'order_date' => \Carbon\Carbon::parse($this->created_at)->format('d-m-Y'),
            'order_time' => \Carbon\Carbon::parse($this->created_at)->format('H:i:s'),
            'payment_method' => $this->payment_method,
            'order_type' => $this->type,
            'order_address' => $address?$address->address:"",
            'client_name'=>$auth,
            'client_phone'=>$address?$address->phone:"",
            'order_lat'=>$address?(string)$address->lat:"",
            'order_lon'=>$address?(string)$address->lng:"",
            'delivery_name'=>$delivery?$delivery->name:"",
            'delivery_image'=>$delivery?asset($delivery->image):"",
            'delivery_phone'=>$delivery?$delivery->phone:"",
            'order_status' => $this->status,
            'first_status_time' => \Carbon\Carbon::parse($this->first_status_time)->format('H:i:s'),
            'second_status_time' => \Carbon\Carbon::parse($this->second_status_time)->format('H:i:s'),
            'third_status_time' => \Carbon\Carbon::parse($this->third_status_time)->format('H:i:s'),
            'forth_status_time' => \Carbon\Carbon::parse($this->forth_status_time)->format('H:i:s'),
            'products' => OrderHasProductResource::collection($OrderProducts),
            'price'=>$price,

        ];
    }
}
