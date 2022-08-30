<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;

class ProductInactive
{
    public function handle($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = [
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
