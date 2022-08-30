<?php 

namespace App\Actions\Admin\Product;

use Carbon\Carbon;
use App\Models\Product;
use App\Http\Requests\Product\UpdateProductDataRequest;
class UpdateProductData
{
    public function handle(UpdateProductDataRequest $request): bool 
    {
        $id = $request->id;
        $product = $request->all();
        $product['product_slug_en'] = strtolower(str_replace(' ', '-', $request->product_name_en)); 
        $product['product_slug_fr'] = strtolower(str_replace(' ', '-', $request->product_name_fr));
        return Product::findorFail($id)->update($product);
    }
}