<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelClassResource extends JsonResource
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
            'star_rating' => $this->star_rating,
            'description' => $this->description,
            'hotels' => HotelCollection::make($this->whenLoaded('hotels')),
        ];
    }
}
