<?php

namespace App\Actions\Admin\Brand;

use App\Models\Brand;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Brand\storeBrandRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


Class UpdateBrand
{

    public function handle(storeBrandRequest $request): Bool 
    {
        $id = $request->id;
        $old_image = $request->old_image;
        $file = $request->file('brand_image');
        if($file){
            Storage::delete('/public/upload/brand_image/'.$old_image);
            $img = Image::make($file)->resize(300,200);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/brand_image/'.$name);

                return  Brand::findorFail($id)->update([
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_fr' => $request->brand_name_fr,
                    'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
                    'brand_slug_fr'=>strtolower(str_replace('','_',$request->brand_name_fr)),
                    'brand_image' => $name,
                    'created_at'=> Carbon::now()
                ]);
        }else{
                return Brand::findorFail($id)->update([
                    'brand_name_en' => $request->brand_name_en,
                    'brand_name_fr' => $request->brand_name_fr,
                    'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
                    'brand_slug_fr'=>strtolower(str_replace('','_',$request->brand_name_fr)),
                    'created_at'=> Carbon::now()
                ]);
        }
    }

}





   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
