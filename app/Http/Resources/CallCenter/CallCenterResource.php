<?php

namespace App\Http\Resources\CallCenter;

use App\Models\CallCenter;
use Illuminate\Http\Resources\Json\JsonResource;

class CallCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $CallCenter = CallCenter::find($this->id);
        $token = $CallCenter->createToken('Laravel Password Grant Client', ['callcenter'])->accessToken;


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
