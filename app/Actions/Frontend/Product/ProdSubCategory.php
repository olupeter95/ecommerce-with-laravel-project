<?php

namespace App\Actions\Frontend\Product;

use App\Models\Product;
class ProdSubCategory
{
    public function handle($id, $slug)
    {
        $prod = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        return view('layouts.categories.subcat-view',compact('prod'));
    }
}
