<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=>'required|min:3',
            'email'=>['required','email',$this->route('id') ?  Rule::unique('clients')->ignore($this->route('id')) : 'unique:clients,email'],
            'address'=>'required',
            'contact'=>'required|min:7',
            'image'=>'image|mimes:png,jpg,jpeg,webp',
              'order' => 'nullable|integer|min:0', // Non-negative integer validation
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Please Enter the client Name',
            'name.min'=>'Name must be at least 3 character',
            'email.required'=>'Please Enter client Email Address',
            'address.required'=>'Please enter address',
            'email.email'=>'Invalid Email ID',
            'contact.required'=>'Please Enter contact number',
            'contact.min'=>'contact number must be at least of 7 digits',
            'image.image'=>'Image must be a type of JPG,PNG,JPEG',
            'image.mimes'=>'Image must be a type of JPG,PNG,JPEG',
        ];
    }
}
