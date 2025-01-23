<?php

namespace App\Http\Requests\ContactForm;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
            'subject' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'surname.required' => 'Please enter your surname.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email address.',
            'description.required' => 'Please enter a description.',
            'subject.required' => 'Please enter a subject.',
        ];
    }
}
