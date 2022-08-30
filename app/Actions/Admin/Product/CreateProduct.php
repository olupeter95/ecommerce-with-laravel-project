<?php

namespace App\Actions\Admin\Product;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\MultiImage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Product\CreateProductRequest;

class CreateProduct
{
    public function handle(CreateProductRequest $request): bool
    {
        $file = $request->file('product_thumbnail');
        $img = Image::make($file);
        $img->resize(917,1000);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/product/thumbnail/'.$name);
        $product = $request->except('_token','photo_name');
        $product['product_slug_en'] = strtolower(str_replace(' ', '-', $request->product_name_en));
        $product['product_slug_fr'] = strtolower(str_replace(' ', '-', $request->product_name_fr));
        $product['product_thumbnail'] = $name;
        $product['status'] = 1;
        $product['created_at'] = Carbon::now();
        return $product_id = Product::insertGetId($product);
         
        // Multiple Image upload
        $files = $request->file('photo_name');
        foreach($files as $imgs){
            $imgs = Image::make($file);
            $imgs->resize(917,1000);
            $names = $file->getClientOriginalName();
            $imgs->save('storage/upload/product/image/'.$names);

            return MultiImage::create([
                'product_id' => $product_id,
                'photo_name' => $names,
                'created_at' => Carbon::now(),
            ]);
        }
        // End Multiple Image upload
    }
}
