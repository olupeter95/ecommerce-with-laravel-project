<?php

namespace App\Http\Requests\SubSubCategory;

use Illuminate\Foundation\Http\FormRequest;

class SubSubCategoryRequest extends FormRequest
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
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_en'=>'required|max:255',
            'subsubcategory_name_fr'=>'required|max:255',
        ];
    }

    public function messages(){
        return [
            'category_id'=>'category is required',
            'subcategory_id'=>'category is required',
            'subsubcategory_name_en.required'=>'category Name En is required',
            'subsubcategory_name_en.max'=>'exceed maximum number of character',
            'subsubcategory_name_fr.required'=>'category Name Fr is required',
            'subsubcategory_name_fr.max'=>'exceed maximum number of character',
        ];
    }
}
