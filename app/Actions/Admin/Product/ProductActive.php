<?php 
namespace App\Actions\Admin\Product;

use App\Models\Product;

class ProductActive 
{
    public function handle($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
           'message' => 'Product Active',
           'alert-type' => 'success'
       );
    
       return redirect()->back()->with($notification);
    }
}
?>