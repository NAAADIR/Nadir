<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BedroomUpdateRequest extends FormRequest
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
            'phone_bedroom' => ['string'],
            'price' => ['numeric', 'between:-999.99,999.99'],
            'image' => ['string'],
            'bedroom_type_id' => ['required', 'integer', 'exists:bedroom_types,id'],
            'hotel_id' => ['required', 'integer', 'exists:hotels,id'],
        ];
    }
}
