<?php 

namespace App\Actions\Frontend\Product;

use App\Models\Product;
class ModalViewProduct
{
    public function handle($id)
    {
        $product = Product::with('category','brand')->findorFail($id);
        $color_en = $product->product_color_en;
        $prod_color_en = explode(',',$color_en);
        $color_fr = $product->product_color_fr;
        $prod_color_fr = explode(',',$color_fr);
        $prod_size_en = explode(',',$product->product_size_en);
        $prod_size_fr = explode(',',$product->product_size_fr);
        return response()->json([
            'product'=>$product,
            'color_en'=>$prod_color_en,
            'color_fr'=>$prod_color_fr,
            'size_en'=>$prod_size_en,
            'size_fr'=>$prod_size_fr,
        ]);
    }
}