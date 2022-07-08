<?php 
namespace App\Actions\Admin\Slider;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class UpdateSlider 
{
    public function handle(Request $request): Bool 
    {
        $id = $request->id;
        $old_img = $request->old_image;
        $file = $request->file('slider_img');
        if($file){
            Storage::delete('/public/upload/slider/'.$old_img->slider_img);
            $img = Image::make($file);
            $img->resize(870,370);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/slider/'.$name);
           $slider = Slider::findorFail($id)->update([
                'title_en'=>$request->title_en,
                'title_fr'=>$request->title_fr,
                'description_en'=>$request->description_en,
                'description_fr'=>$request->description_fr,
                'slider_img' => $name,
                'status'=>0,
                'created_at' => Carbon::now()
            ]);
        }else{
            $slider = Slider::findorFail($id)->update([
                'title_en'=>$request->title_en,
                'title_fr'=>$request->title_fr,
                'description_en'=>$request->description_en,
                'description_fr'=>$request->description_fr,
                'status'=>0,
                'created_at' => Carbon::now()
            ]);
        }
        
        return $slider;
    }
}
?>