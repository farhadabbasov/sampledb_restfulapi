<?php

namespace App\Http\Requests\Office;

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
            'city'=>['required','string','max:50'],
            'phone'=>['required','string','max:50'],
            'addressLine1'=>['required','string','max:50'],
            'addressLine2'=>['nullable','string','max:50'],
            'state'=>['nullable','string','max:50'],
            'country'=>['required','string','max:50'],
            'postalCode'=>['required','string','max:15'],
            'territory'=>['required','string','max:10'],
        ];
    }
}
