<?php 
namespace App\Actions\Frontend\Product;

use App\Models\Product;
use App\Models\MultiImage;

class ProductDetails
{
    public function handle($id)
    {
        $products = Product::findorFail($id);
        $color_en = $products->product_color_en;
        $prod_color_en = explode(',',$color_en);
        $color_fr = $products->product_color_fr;
        $prod_color_fr = explode(',',$color_fr );
        $prod_size_en = explode(',',$products->product_size_en);
        $prod_size_fr = explode(',',$products->product_size_fr);
        $multImg = MultiImage::where('product_id',$id)->orderBy('photo_name','ASC')->get();
        $cat_id = $products->category_id;
        $relatedProd = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        return view('layouts.pages.product-detail',compact('products','multImg','prod_color_en',
    'prod_color_fr','prod_size_en','prod_size_fr','relatedProd'));
    }
}
?>