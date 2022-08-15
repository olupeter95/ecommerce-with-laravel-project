<?php 

namespace App\Actions\Admin\Product;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductView
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $product = Product::latest()->get();
        return view('admin.product.view',compact('product','admin'));
    }
}
