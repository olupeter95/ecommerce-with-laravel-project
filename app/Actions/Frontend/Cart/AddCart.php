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
        if($product->discount_price == NULL) {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name,
                'qty'=>$request->qty,
                'price'=> $product->selling_price,
                'weight'=> 1,
                'options' => [
                    'image' => $product->product_thumbnail, 
                    'color_en'=>$request->color_en,
                    'color_fr'=>$request->color_fr,
                    'size_en' => $request->size_en,
                    'size_fr' => $request->size_fr,
                    'product_name_fr' => $request->product_name_fr,
                ]
            ]);
            return response()->json(['success' => 'successfully added on your cart']);
        }else {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name,
                'qty'=>$request->qty,
                'weight'=> 1,
                'price'=> $product->selling_price,
                'options' => [
                    'image' => $product->product_thumbnail, 
                    'color_en'=>$request->color_en,
                    'color_fr'=>$request->color_fr,
                    'size_en' => $request->size_en, 
                    'size_fr' => $request->size_fr,
                    'product_name_fr' => $request->product_name_fr,
                ]
            ]);
            return response()->json(['success' => 'successfully added on your cart']);
        }
    }

}
