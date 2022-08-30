<?php

namespace App\Actions\Frontend\Product;

use App\Models\Product;
class ProductTag
{
    public function handle($tags)
    {
        $prod = Product::where('status',1)->where('product_tags_en', $tags)->orWhere(
        'product_tags_fr', $tags)->orderBy('id','DESC')->paginate(3);
        $prod_color_en = Product::where('product_tags_en', $tags)->select('product_color_en')->get();
        $color_en =explode(',', $prod_color_en);
        $color_fr = explode(',', Product::groupBy('product_color_fr')->select('product_color_fr')->get());
         return view('layouts.tags.view', compact('prod', 'color_en', 'color_fr'));
    }
}
