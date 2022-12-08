<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'street' => ['required', 'string'],
            'complement1' => ['string'],
            'complement2' => ['string'],
            'postcode' => ['string'],
            'city' => ['string'],
            'appartment_number' => ['string'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
        ];
    }
}
