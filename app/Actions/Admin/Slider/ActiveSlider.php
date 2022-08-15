<?php 

namespace App\Actions\Admin\Slider;

use App\Models\Slider;

class ActiveSlider
{
    public function handle($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = [
            'message' => 'Slider Active',
            'alert-type' => 'success'
        ];
    
       return redirect()->back()->with($notification);
    }
}
