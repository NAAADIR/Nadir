<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BenefitResource extends JsonResource
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
            'start_at' => Carbon::createFromDate($this->start_at)->format('d-m-Y'),
            'end_at' => Carbon::createFromDate($this->end_at)->format('d-m-Y'),
            'duration' => $this->duration,
            'image' => $this->image,
            'bedroom_id' => $this->bedroom_id,
            'benefit_price_id' => $this->benefit_price_id,
            'user_id' => $this->user_id,
        ];
    }
}
