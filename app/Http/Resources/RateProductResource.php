<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class RateProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $customer=Customer::find($this->customer_id);
        $image = $customer['image'];
        if ($image == Null) {
            $image = '';
        } else {
            $image = assest($this->image);
        }

        return [
            'id' => $this->id,
            'name' => $customer?$customer->name:"",
            'image'=>$image,
            'rate'=>$this->rate,
            'review'=>$this->review?$this->review:"",
            'date' => \Carbon\Carbon::parse($this->created_at)->format('d-m-Y'),
            
           
            
        ];
    }
}
