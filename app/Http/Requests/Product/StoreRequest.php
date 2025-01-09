<?php

namespace App\Http\Requests\Product;

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
            'productCode'=>['required','string','max:15','unique:products,productCode'],
            'productName'=>['required','string','max:70'],
            'productLine'=>['required','string','max:50','exists:productlines,productLine'],
            'productScale'=>['required','string','max:10'],
            'productVendor'=>['required','string','max:50'],
            'productDescription'=>['required','text'],
            'quantityInStock'=>['required','smallint'],
            'buyPrice'=>['required','decimal'],
            'MSRP'=>['required','decimal'],
        ];
    }
}
