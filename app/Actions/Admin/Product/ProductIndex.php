<?php 

namespace App\Actions\Admin\Product;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductIndex
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.add',compact('admin','categories','brands'));
    }
}
