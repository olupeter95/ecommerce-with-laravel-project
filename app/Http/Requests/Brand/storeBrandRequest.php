<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'brand_name_en' => 'required|max:255',
            'brand_name_fr' => 'required|max:255',
            'brand_image' => 'max:2000',
        ];
    }

    public function messages()
    {
        return [
            'brand_name_en.required' => 'Brand Name En is required',
            'brand_name_en.max' => 'exceed maximum number of character',
            'brand_name_fr.required' => 'Brand Name Fr is required',
            'brand_name_fr.max' => 'exceed maximum number of character',
            'brand_image.required' => 'Brand Image is required',
            'brand_image.max' => 'Maximum file upload file size, is 2mb',
        ];
    }
}
