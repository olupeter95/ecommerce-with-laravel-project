<?php 

namespace App\Actions\Admin\Product;

use App\Models\Admin;
use App\Models\MultiImage;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductDetails 
{
    public function handle($id)
    {
        $aid = Auth::id();
        $admin = Admin::find($aid);
        $prod = Product::with('brand', 'category', 'subcategory', 'subsubcategory', 'multiimage')
        ->where('id', $id)->first();
        $multiImg = MultiImage::where('product_id', $id)->get();
        return view('admin.product.product-details',compact('admin', 'prod', 'multiImg'));
    }
}