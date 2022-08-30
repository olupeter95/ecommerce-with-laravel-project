<?php

namespace App\Actions\Frontend\Product;

use App\Models\Product;
use App\Models\MultiImage;
class ProductDetails
{
    public function handle($id)
    {
        $product = Product::findorFail($id);
        $color_en = $product->product_color_en;
        $prod_color_en = explode(',', $color_en);
        $color_fr = $product->product_color_fr;
        $prod_color_fr = explode(',', $color_fr);
        $prod_size_en = explode(',', $product->product_size_en);
        $prod_size_fr = explode(',', $product->product_size_fr);
        $multImg = MultiImage::where('product_id', $id)->orderBy('photo_name', 'ASC')->get();
        $cat_id = $product->category_id;
        $relatedProd = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy(
        'id', 'DESC')->get();
        return view('layouts.pages.product-detail', compact('product', 'multImg', 'prod_color_en',
        'prod_color_fr', 'prod_size_en', 'prod_size_fr', 'relatedProd'));
    }
}
