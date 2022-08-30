<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'image' => 'mimes:jpg,png|max:4000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name field is required',
            'name.max' => 'exceeded maximum character',
            'email.required' => 'email field is required',
            'phone.required' => 'Phone field is required',
            'email.email' => 'this is not a valid email address',
            'image.mimes' => 'only file of type jpg,and png can be uploaded',
            'image.max' => 'only file of type jpg,and png can be uploaded',
        ];
    }
}
