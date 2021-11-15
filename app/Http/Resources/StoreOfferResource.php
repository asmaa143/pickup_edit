<?php

namespace App\Http\Resources;

use App\Models\Offer;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreOfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $offer=Offer::where('id',$this->offer_id)->first();
        $image = $offer['image'];
        if ($image == Null) {
            $image = '';
        } else {
            $image = asset($image);
        }

        return [
            'id' => $this->id,
            'image'=>$image,
           
           
            
        ];
    }
}
