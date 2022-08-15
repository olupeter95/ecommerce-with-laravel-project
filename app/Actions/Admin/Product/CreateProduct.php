<?php

namespace App\Actions\Admin\Product;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\MultiImage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Product\CreateProductRequest;

class CreateProduct
{
    public function handle(CreateProductRequest $request): Bool
    {
        $file = $request->file('product_thumbnail');
        $img = Image::make($file);
        $img->resize(917,1000);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/product/thumbnail/'.$name);
        return $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'product_slug_en' => strtolower(str_replace('', '-', $request->product_name_en)),
            'product_slug_fr' => strtolower(str_replace('', "-", $request->product_name_fr)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_fr' => $request->product_tags_fr,
            'product_size_en' => $request->product_size_en,
            'product_size_fr' => $request->product_size_fr,
            'product_color_en' => $request->product_color_en,
            'product_color_fr' => $request->product_color_fr,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_fr' => $request->short_desc_fr,
            'description_en' => $request->description_en,
            'description_fr' => $request->description_fr,
            'product_thumbnail' => $name,
            'featured' => $request-> featured,
            'hot_deals' => $request->hot_deals,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(), 
        ]);

        ////// Multiple Image upload //////
        $files = $request->file('photo_name');
        foreach($files as $imgs){
            $imgs = Image::make($file);
            $imgs->resize(917,1000);
            $names = $file->getClientOriginalName();
            $imgs->save('storage/upload/product/image/'.$names);

            return MultiImage::insert([
                'product_id' => $product_id,
                'photo_name' => $names,
                'created_at' => Carbon::now(),
            ]);
        }
      ////// End Multiple Image upload //////
    }
}
