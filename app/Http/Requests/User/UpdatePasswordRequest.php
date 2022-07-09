<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'current_password'=>'required|current_password',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'current_password.required'=>'Currrent Password field required',
            'current_password.current_password'=>'incorrect password',
            'password.required'=>'Password field required',
            'password.confirmed'=>'Password do not match',
            'password_confirmation'=>'Password Confimation field required'
        ];
    }
}
