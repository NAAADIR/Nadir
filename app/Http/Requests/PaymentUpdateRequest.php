<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
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
            'creditCardName' => ['required', 'string'],
            'creditCardNumber' => ['required', 'string'],
            'creditCardExpirationDate' => ['required', 'date'],
            'cvv' => ['required', 'integer'],
            'start_at' => ['required'],
            'end_at' => ['required'],
            'payment_type_id' => ['required', 'integer', 'exists:payment_types,id'],
        ];
    }
}
