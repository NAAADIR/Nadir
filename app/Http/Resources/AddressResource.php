<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'complement1' => $this->complement1,
            'complement2' => $this->complement2,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'appartment_number' => $this->appartment_number,
            'country_id' => $this->country_id,
            'users' => UserCollection::make($this->whenLoaded('users')),
        ];
    }
}
