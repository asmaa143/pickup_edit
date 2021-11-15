<?php

namespace App\Http\Resources;

use App\Models\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'base_url' => $this->base_url,
            'app_status'=>$this->app_status,
            
        ];
    }
}
