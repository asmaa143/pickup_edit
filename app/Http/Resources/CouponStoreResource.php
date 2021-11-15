<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        
       

        return [
            
            'id' => $this->id,
            'code' => $this->code,
            'value'=>$this->value,
            'minimum'=>(double)$this->minimum,
            'maximum'=>(double)$this->maximum,
            'start_date' => \Carbon\Carbon::parse($this->start_date)->format('d-m-Y'),
            'end_date' => \Carbon\Carbon::parse($this->end_date)->format('d-m-Y'),
           
            
        ];
    }
}
