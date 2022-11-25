<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'creditCardName' => $this->creditCardName,
            'creditCardNumber' => $this->creditCardNumber,
            'creditCardExpirationDate' => $this->creditCardExpirationDate,
            'cvv' => $this->cvv,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'payment_type_id' => $this->payment_type_id,
            'bookings' => BookingCollection::make($this->whenLoaded('bookings')),
        ];
    }
}
