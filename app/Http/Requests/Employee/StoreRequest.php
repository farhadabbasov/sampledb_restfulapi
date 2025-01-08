<?php

namespace App\Http\Requests\Employee;

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
            'employeeNumber'=>['required','integer','unique:employees,employeeNumber'],
            'lastName'=>['required','max:50','string'],
            'firstName'=>['required','max:50','string'],
            'extension'=>['required','max:10','string'],
            'email'=> ['required','max:100','string','email','unique:employees,email'],
            'officeCode'=>['required','max:10','string','exists:offices,officeCode'],
            'reportsTo'=>['nullable','integer'],
            'jobTitle'=>['required','max:50','string'],
        ];
    }
}
