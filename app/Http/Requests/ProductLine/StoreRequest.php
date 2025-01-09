<?php

namespace App\Http\Requests\ProductLine;

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
            'productLine'=>['required','string','max:50','unique:productlines,productLine'],
            'textDescription'=>['nullable','string','max:4000'],
            'htmlDescription'=>['nullable','mediumtext'],
            'image'=>['nullable','mediumblob','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ];
    }
}
