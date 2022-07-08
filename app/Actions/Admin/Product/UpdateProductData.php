<?php 
namespace App\Actions\Admin\Product;

use Carbon\Carbon;
use App\Models\Product;
use PhpParser\Node\Expr\Cast\Bool_;
use App\Http\Requests\Product\UpdateProductDataRequest;

Class UpdateProductData
{
    public function handle(UpdateProductDataRequest $request): Bool 
    {
        $id = $request->id;
            $prdouct_id = Product::findorFail($id)->update([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_id'=>$request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_fr'=>$request->product_name_fr,
            'product_slug_en'=> strtolower(str_replace(" ","-",$request->product_name_en)),
            'product_slug_fr'=>strtolower(str_replace(" ","-",$request->product_name_fr)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_fr'=>$request->product_tags_fr,
            'product_size_en'=>$request->product_size_en,
            'product_size_fr'=>$request->product_size_fr,
            'product_color_en'=>$request->product_color_en,
            'product_color_fr'=>$request->product_color_fr,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_desc_en'=>$request->short_desc_en,
            'short_desc_fr'=>$request->short_desc_fr,
            'description_en'=>$request->description_en,
            'description_fr'=>$request->description_fr,
            'featured'=>$request->featured,
            'hot_deals'=>$request->hot_deals,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
            'created_at' => Carbon::now(), 
        ]);
        return $prdouct_id;
    }
}
?>