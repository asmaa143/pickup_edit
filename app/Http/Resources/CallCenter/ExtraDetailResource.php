<?php

namespace App\Http\Resources\CallCenter;

use App\Models\ExtraDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class ExtraDetailResource extends JsonResource
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
            'title' => $this->title,
            'price'=>(string)$this->price,
            'defalut'=>(int)$this->default,
            'multi_choice'=>(int)$this->multi_choice,
           
            
        ];
    }
}
