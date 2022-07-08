<?php 
namespace App\Actions\Admin\Product;

use Carbon\Carbon;
use App\Models\MultiImage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateProductImage 
{
    public function handle(Request $request): Bool 
    {
        $img_id = $request->photo_name;
        foreach($img_id as $id => $img){
            $imgDel = MultiImage::find($id);
            Storage::delete('/public/product/image/'.$imgDel->photo_name);            
            $img_name = Image::make($img);
            $img_name->resize(917,1000);
            $names_img = $img->getClientOriginalName();
            $img_name->save('storage/upload/product/image/'.$names_img);

           $img = MultiImage::Where('id',$id)->update([
                
                'photo_name'=>$names_img,
                'updated_at' => Carbon::now(),
            ]);
        } 
        return $img;
    }
}
?>