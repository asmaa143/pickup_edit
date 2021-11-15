<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class AddsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        
        $image = $this['image'];
        if ($image == Null) {
            $image = '';
        } else {
            $image = assest($this->image);
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image'=>$image,
            'product_id'=>$this->product_id,
            'link'=>$this->link,
           
            
        ];
    }
}
