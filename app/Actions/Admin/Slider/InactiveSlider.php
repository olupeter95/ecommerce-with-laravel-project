<?php 
namespace App\Actions\Admin\Slider;

use App\Models\Slider;

class InactiveSlider
{
    public function handle($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
        'message' => 'Slider Inactive',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
?>