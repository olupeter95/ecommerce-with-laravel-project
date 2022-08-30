<?php

namespace App\Http\Requests\AdminProfile;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpwd' => 'required',
            'pwd' => 'required|confirmed',
            'pwd_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'oldpwd.required' => 'Currrent Password field required',
            'pwd.required' => 'New Password field required',
            'pwd.confirmed' => 'Password do not match',
        ];
    }
}
