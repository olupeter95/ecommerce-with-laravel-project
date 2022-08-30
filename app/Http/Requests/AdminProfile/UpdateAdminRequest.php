<?php

namespace App\Http\Requests\AdminProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'name' => 'max:255',
            'email' => 'email',
            'profile_photo_path' => 'mimes:jpg,png|max:4000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name field is required',
            'name.max' => 'exceeded maximum character',
            'email.required' => 'email field is required',
            'email.email' => 'this is not a valid email address',
            'profile_photo_path.mimes' => 'only file of type jpg,and png can be uploaded',
            'profile_photo_path.max' => 'only file of type jpg,and png can be uploaded',
        ];
    }
}
