<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BenefitStoreRequest extends FormRequest
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
            'start_at' => [''],
            'end_at' => [''],
            'duration' => [''],
            'image' => ['string'],
            'bedroom_id' => ['required', 'integer', 'exists:bedrooms,id'],
            'benefit_price_id' => ['required', 'integer', 'exists:benefit_prices,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
