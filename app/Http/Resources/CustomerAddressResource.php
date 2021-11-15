<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        
       $customer= new CustomerResource(Customer::find(auth()->user()->id));

        return [
            'address'=>$this->address,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'building_name'=>$this->building_name,
            'flat_number'=>$this->flat_number,
            'floor_number'=>$this->floor_number,
            'customer'=> $customer,
            'phone'=>$this->phone,
            'details'=>$this->details,
            'active'=>$this->active,
           
            
        ];
    }
}
