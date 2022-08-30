<?php

namespace App\Actions\Frontend\Product;

use App\Models\Product;
class ProdSubSubCategory
{
    public function handle($id, $slug)
    {
        $prod = Product::where('status',1)->where('subsubcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        return view('layouts.categories.subsubcat-view',compact('prod'));
    }
}
