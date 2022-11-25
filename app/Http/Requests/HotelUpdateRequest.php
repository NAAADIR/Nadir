<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string'],
            'street' => ['string'],
            'postcode' => ['string'],
            'phone' => ['string'],
            'hotel_class_id' => ['required', 'integer', 'exists:hotel_classes,id'],
        ];
    }
}
