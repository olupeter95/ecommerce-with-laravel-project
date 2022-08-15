<?php 

namespace App\Actions\Admin\Product;

use App\Models\Product;

class ViewProductwithAjax 
{
    public function handle($id)
    {
        $products = Product::findorFail($id);
        $color_en = $products->product_color_en;
        $prod_color_en = explode(',', $color_en);
        $color_fr = $products->product_color_fr;
        $prod_color_fr = explode(',', $color_fr);
        $prod_size_en = explode(',', $products->product_size_en);
        $prod_size_fr = explode(',', $products->product_size_fr);
        return response()->json([
            'product'=>$products,
            'color_en'=>$prod_color_en,
            'color_fr'=>$prod_color_fr,
            'prod_size_en'=>$prod_size_en,
            'prod_size_fr'=>$prod_size_fr,
        ]);
    }
}