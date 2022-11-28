<?php

namespace App\Actions\Frontend\User;

use App\Models\Product;

class SearchCategoryProduct
{
    public function handle($id)
    {
        $products = Product::where('category_id', $id)->orderBy('id', 'ASC')->paginate(5);
        return view('layouts.categories.category_product', compact('products'));
    }
}