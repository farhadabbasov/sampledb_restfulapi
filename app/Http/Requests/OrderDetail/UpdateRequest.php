<?php

namespace App\Http\Requests\OrderDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'productCode'=>['required','string','exists:products,productCode'],
            'quantityOrdered'=>['required','integer'],
            'priceEach'=>['required','decimal'],
            'orderLineNumber'=>['required','smallint'],
        ];
    }
}
