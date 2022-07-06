<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'category_name_en'=>'required|max:255',
            'category_name_fr'=>'required|max:255',
            'category_icon'=>'required|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'category_name_en.required'=>'category Name En is required',
            'category_name_en.max'=>'exceed maximum number of character',
            'category_name_fr.required'=>'category Name Fr is required',
            'category_name_fr.max'=>'exceed maximum number of character',
            'category_icon.required'=>'category Image is required',
            'category_icon.max'=>'Maximum file upload file size, is 2mb',
        ];
    }
}
