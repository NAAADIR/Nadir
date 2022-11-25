<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'payment_date' => $this->payment_date,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
            'payment_id' => $this->payment_id,
            'bedrooms' => BedroomCollection::make($this->whenLoaded('bedrooms')),
        ];
    }
}
