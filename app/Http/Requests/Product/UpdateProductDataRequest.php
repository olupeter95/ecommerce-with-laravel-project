<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductDataRequest extends FormRequest
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
            'brand_id'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
            'product_name_en'=>'required',
            'product_name_fr'=>'required',
            'product_code'=>'required',
            'product_qty'=>'required',
            'product_tags_en'=>'required',
            'product_tags_fr'=>'required',
            'product_size_en'=>'required',
            'product_size_fr'=>'required',
            'product_color_en'=>'required',
            'product_color_fr'=>'required',
            'selling_price'=>'required',
            'short_desc_en'=>'required',
            'short_desc_fr'=>'required',
            'description_en'=>'required',
            'description_fr'=>'required',
        ];
    }
}
