<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'creditCardExpirationDate' => Carbon::createFromDate($this->creditCardExpirationDate)->format('d-m-Y'),
            'cvv' => $this->cvv,
            'payment_type_id' => $this->payment_type_id,
            'payment-types' => PaymentTypeResource::collection($this->whenLoaded('payment-types')),
            'bookings' => BookingCollection::make($this->whenLoaded('bookings')),
        ];
    }
}
