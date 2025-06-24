<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceQueryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow public access
    }

    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'email'      => 'nullable|email|max:255',
            'message'    => 'required|string',
            'service_id' => 'required|exists:services,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'       => 'Name is required.',
            'phone.required'      => 'Phone number is required.',
            'email.email'         => 'Please enter a valid email address.',
            'message.required'    => 'Message field cannot be empty.',
            'service_id.required' => 'Please select a valid service.',
            'service_id.exists'   => 'Selected service does not exist.',
        ];
    }
}
