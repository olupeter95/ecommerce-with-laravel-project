<?php 

namespace App\Actions\Admin\Product;

use App\Models\Product;
use App\Models\MultiImage;
use Illuminate\Support\Facades\Storage;

class DeleteProduct 
{
    public function handle($id)
    {
        $prods = Product::findorFail($id);
        Storage::delete('public/product/thumbnail/'.$prods->product_thumbnail);
        Product::findorFail($id)->delete();
        $image = MultiImage::where('product_id',$id)->get();
        foreach($image as $imgdel){
            Storage::delete('public/product/image/'.$imgdel->photo_name);
            return MultiImage::where('product_id',$id)->delete();
        }
    }
}
