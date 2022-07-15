<?php 
namespace App\Actions\Admin\Slider;

use App\Models\Admin;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class ViewSlider
{
    public function handle()
    {
        $aid = Auth::id();
        $admin = Admin::find($aid);
        $sliders = Slider::latest()->get();
        return view('admin.slider.view',compact('admin','sliders'));
    }
}
?>