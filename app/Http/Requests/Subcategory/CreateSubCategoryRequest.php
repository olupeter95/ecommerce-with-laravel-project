<?php

namespace App\Http\Requests\Subcategory;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubCategoryRequest extends FormRequest
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
            'category_id' => 'required',
            'subcategory_name_en' => 'required|max:255',
            'subcategory_name_fr' => 'required|max:255',
        ];
    }

    public function messages(){
        return [
            'category_id' => 'category is required',
            'subcategory_name_en.required' => 'category Name En is required',
            'subcategory_name_en.max' => 'exceed maximum number of character',
            'subcategory_name_fr.required' => 'category Name Fr is required',
            'subcategory_name_fr.max' => 'exceed maximum number of character',
        ];
            
    }
}
