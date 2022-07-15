<?php 
namespace App\Actions\Admin\Product;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductDetails 
{
    public function handle($id)
    {
        $aid = Auth::id();
        $admin = Admin::find($aid);
        $prods = Product::findorFail($id);
        return view('admin.product.product-details',compact('admin','prods'));
    }
}
?>