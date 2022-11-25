<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BedroomResource extends JsonResource
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
            'phone_bedroom' => $this->phone_bedroom,
            'price' => $this->price,
            'image' => $this->image,
            'bedroom_type_id' => $this->bedroom_type_id,
            'hotel_id' => $this->hotel_id,
            'benefits' => BenefitCollection::make($this->whenLoaded('benefits')),
            'bookings' => BookingCollection::make($this->whenLoaded('bookings')),
        ];
    }
}
