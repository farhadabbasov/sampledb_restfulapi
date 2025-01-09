<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'checkNumber'=>['required','string','max:50','unique:payments,checkNumber'],
            'paymentDate'=>['required','date'],
            'amount'=>['required','decimal'],
            'customerNumber'=>['required','integer','exists:customers,customerNumber'],
        ];
    }
}
