<?php

namespace App\Http\Resources;

use App\Models\ExtraDetail;
use App\Models\CartProductExtradetails;
use Illuminate\Http\Resources\Json\JsonResource;

class CartExtraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

       $extradetailId =CartProductExtradetails::where('cart_id',$this->cart_id)->where('extra_id',$this->id)->pluck('extradetail_id');
       $extraDetails= ExtraDetailResource::collection(ExtraDetail::whereIn('id',$extradetailId)->get());

        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'optional'      => $this->optional,
            'extra_details' => $extraDetails,
           
            
        ];
    }
}
