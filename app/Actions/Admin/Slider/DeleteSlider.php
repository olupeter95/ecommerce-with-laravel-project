<?php 

namespace App\Actions\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class DeleteSlider 
{
    public function handle($id): bool 
    {
        $slide = Slider::findorFail($id);
        Storage::delete('public/upload/slider/'.$slide->slider_img);
        return Slider::findorFail($id)->delete();
    }
}