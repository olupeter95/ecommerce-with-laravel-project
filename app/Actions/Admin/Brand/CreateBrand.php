<?php

namespace App\Actions\Admin\Brand;

use App\Models\Brand;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Brand\storeBrandRequest;
use Carbon\Carbon;

class CreateBrand 
{
    public function handle(storeBrandRequest $request): Brand 
    {
        $file = $request->file('brand_image');
        $img = Image::make($file);
        $img->resize(300,200);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/brand_image/'.$name);
        
        return Brand::create([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_fr' => $request->brand_name_fr,
            'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
            'brand_slug_fr'=>strtolower(str_replace('','_',$request->brand_name_fr)),
            'brand_image' => $name,
            'created_at'=> Carbon::now()
        ]);
    }
    
}
