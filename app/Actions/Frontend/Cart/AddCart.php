<?php

namespace App\Actions\Frontend\Cart;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class AddCart
{
    public function handle(Request $request, $id)
    {
        $product = Product::findorFail($id);
        if($product->discount_price === null) {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name,
                'qty'=>$request->qty,
                'price'=> $product->selling_price,
                'weight'=> 1,
                'options' => [
                    'image' => $product->product_thumbnail, 
                    'color'=> $request->color_en,
                    'color_fr'=> $request->color_fr,
                    'size' => $request->product_size_en,
                    'sizefr' => $request->product_size_fr,
                    'productfr' => $request->product_name_fr,
                ]
            ]);
        }else {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name,
                'qty'=>$request->qty,
                'weight'=> 1,
                'price'=> $product->selling_price,
                'options' => [
                    'image' => $product->product_thumbnail, 
                    'color'=>$request->color_en,
                    'colorfr'=>$request->color_fr,
                    'size' => $request->product_size_en, 
                    'sizefr' => $request->product_size_fr,
                    'productfr' => $request->product_name_fr,
                ]
            ]);
        }
        return response()->json(['success' => 'successfully added on your cart']);
    }

}
