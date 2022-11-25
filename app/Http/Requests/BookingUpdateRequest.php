<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
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
            'start_at' => ['date'],
            'end_at' => ['date'],
            'payment_date' => ['date'],
            'amount' => ['numeric', 'between:-999.99,999.99'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'payment_id' => ['required', 'integer', 'exists:payments,id'],
        ];
    }
}
