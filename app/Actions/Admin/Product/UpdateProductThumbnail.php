<?php 

namespace App\Actions\Admin\Product;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UpdateProductThumbnail 
{
    public function handle(Request $request): bool 
    {
        $pro_id = $request->id;
        $old_img = $request->old_img;
        $thumb_img = $request->file('product_thumbnail');
        Storage::delete('/public/product/thumbnail/'.$old_img);
        $thumb = Image::make($thumb_img); 
        $thumb->resize(917,100);
        $thumb_name =  $thumb_img->getClientOriginalName(); 
        $thumb->save('storage/upload/product/thumbnail/'.$thumb_name);
        return Product::findorFail($pro_id)->update([
            'product_thumbnail'=>$thumb_name,
            'updated_at'=> Carbon::now()
        ]);  
    } 
}
