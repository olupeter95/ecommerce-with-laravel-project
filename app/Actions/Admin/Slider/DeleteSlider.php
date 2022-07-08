<?php 
namespace App\Actions\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class DeleteSlider 
{
    public function handle($id): Bool 
    {
        $slide = Slider::findorFail($id);
        Storage::delete('public/upload/slider/'.$slide->slider_img);
        $slider = Slider::findorFail($id)->delete();
        return $slider;
    }
}
?>