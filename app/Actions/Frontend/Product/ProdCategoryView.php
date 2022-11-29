<?php

namespace App\Actions\Frontend\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class ProdCategoryView
{
    public function handle($id): View|Factory
    {
        $cat = Category::findorFail($id);
        $prod = Product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->paginate(3);
        return view('layouts.categories.category_view',compact('prod', 'cat'));
    }
}
