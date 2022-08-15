<?php 

namespace App\Actions\Admin\Slider;

use Carbon\Carbon;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Slider\SliderRequest;

class CreateSlider 
{
    public function handle(SliderRequest $request): bool 
    {
        $file = $request->file('slider_img');
        $img = Image::make($file);
        $img->resize(870,370);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/slider/'.$name);
        return Slider::insert([
            'title_en'=>$request->title_en,
            'title_fr'=>$request->title_fr,
            'description_en'=>$request->description_en,
            'description_fr'=>$request->description_fr,
            'slider_img' => $name,
            'status'=>0,
            'created_at' => Carbon::now()
        ]);
    }
}
