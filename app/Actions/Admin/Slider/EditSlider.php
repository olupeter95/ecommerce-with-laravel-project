<?php 
namespace App\Actions\Admin\Slider;

use App\Models\Admin;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class EditSlider
{
    public function handle($id)
    {
        $adminId = Auth::id();
        $admin = Admin::find($adminId);
        $slider = Slider::findorFail($id);
        return view('admin.slider.edit',compact('admin','slider'));
    }
}
?>