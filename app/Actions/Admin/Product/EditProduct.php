<?php 

namespace App\Actions\Admin\Product;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;

class EditProduct 
{
    public function handle($id)
    {
        $adminId = Auth::id();
        $admin = Admin::find($adminId);
        $products = Product::findorFail($id);
        $multiImg = MultiImage::Where('product_id',$id)->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.product.edit',compact('admin','products','brands','categories','subcategories',
        'subsubcategories','multiImg'));
    }
}
