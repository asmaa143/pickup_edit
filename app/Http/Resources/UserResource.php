<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $customer = Customer::find($this->id);
        $token = $customer->createToken('Laravel Password Grant Client', ['customer'])->accessToken;


        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'token'=>$token,
            'device_id'=>$this->device_id?$this->device_id:"",
            'device_type'=>$this->device_type?$this->device_type:"",
            'phone_verify'=>$this->phone_verify,
            
        ];
    }
}
