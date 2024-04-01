<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserPersonalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'phone' => ['nullable'],
            'address' => ['nullable'],
        ];
    
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => __('Name'),
            'email' => __('Email'),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __(':attribute is required'),
            'name.string' => __(':attribute must be a string'),
            'email.required' => __(':attribute is required'),
            'email.email' => __(':attribute must be a valid email address'),
        ];
    }
}
