<?php

namespace App\Http\Requests\Customer;

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
            'customerName'=>['required','max:50','string'],
            'contactLastName'=>['required','max:50','string'],
            'contactFirstName'=>['required','max:10','string'],
            'phone'=>['required','max:50','string'],
            'addressLine1'=>['required','max:50','string'],
            'addressLine2'=>['nullable','max:50','string'],
            'city'=>['required','max:50','string'],
            'state'=>['nullable','max:50','string'],
            'postalCode'=>['nullable','max:50','string'],
            'country'=>['required','max:50','string'],
            'salesRepEmployeeNumber'=>['nullable','integer','exists:employees,employeeNumber'],
            'creditLimit'=>['nullable','decimal:2'],
        ];
    }
}
