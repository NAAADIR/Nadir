<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'street' => $this->street,
            'postcode' => $this->postcode,
            'phone' => $this->phone,
            'image' => $this->image,
            'hotel_class_id' => $this->hotel_class_id,
            'bedrooms' => BedroomCollection::make($this->whenLoaded('bedrooms')),
        ];
    }
}
