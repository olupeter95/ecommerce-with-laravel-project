<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Actions\Admin\Slider\CreateSlider;
use App\Actions\Admin\Slider\DeleteSlider;
use App\Actions\Admin\Slider\UpdateSlider;
use App\Http\Requests\Slider\SliderRequest;

class SliderController extends Controller
{
    public function viewSlider(){
        $aid = Auth::id();
        $admins = Admin::find($aid);
        $sliders = Slider::latest()->get();
        return view('admin.slider.view',compact('admins','sliders'));
    }

    public function storeSlider(SliderRequest $request, CreateSlider $createSlider){
        $createSlider->handle($request);
        $notification = array(
            'message' => 'Slider added successfully',
            'alert-type'=> 'success'
         );
        return redirect()->back()->with($notification); 
    }

    public function editSlider($id){
        $aid = Auth::id();
        $admins = Admin::find($aid);
        $slider = Slider::findorFail($id);
        return view('admin.slider.edit',compact('admins','slider'));
    }

    public function delSlider($id,DeleteSlider $deleteSlider){
        $deleteSlider->handle($id);
        $notification = array(
            'message' => 'Slider deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateSlider(Request $request, UpdateSlider $updateSlider){
        $updateSlider->handle($request);
        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type'=> 'success'
         );
        return redirect()->route('view.slider')->with($notification);

    }

    public function inactiveSlider($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
        'message' => 'Slider Inactive',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
   }

   public function activeSlider($id){
    Slider::findOrFail($id)->update(['status' => 1]);
    $notification = array(
       'message' => 'Slider Active',
       'alert-type' => 'success'
   );

   return redirect()->back()->with($notification);
   }
}
