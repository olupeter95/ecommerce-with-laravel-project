<?php

namespace App\Actions\Frontend\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchCategoryProduct
{
    public function handle(Request $request)
    {
        $request->validate(["search" => "required"]);

		$item = $request->search;
        $categories = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->paginate(5);
        return view('layouts.product.search', compact('categories', 'products'));
    }
}