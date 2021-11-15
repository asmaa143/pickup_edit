<?php

namespace App\Http\Resources;

use App\Models\ExtraDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class ExtraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        
       $extraDetails= ExtraDetailResource::collection(ExtraDetail::where('extra_id',$this->id)->get());

        return [
            'id' => $this->id,
            'title' => $this->title,
            'optional'=>$this->optional,
            'extra_details'=>$extraDetails,
           
            
        ];
    }
}
