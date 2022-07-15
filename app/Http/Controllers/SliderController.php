<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Admin\Slider\EditSlider;
use App\Actions\Admin\Slider\ViewSlider;
use App\Actions\Admin\Slider\ActiveSlider;
use App\Actions\Admin\Slider\CreateSlider;
use App\Actions\Admin\Slider\DeleteSlider;
use App\Actions\Admin\Slider\UpdateSlider;
use App\Http\Requests\Slider\SliderRequest;
use App\Actions\Admin\Slider\InactiveSlider;

class SliderController extends Controller
{
    public function viewSlider(ViewSlider $viewSlider)
    {
        $view = $viewSlider->handle();
        return $view;
    }

    public function storeSlider(SliderRequest $request, CreateSlider $createSlider)
    {
        $createSlider->handle($request);
        $notification = array(
            'message' => 'Slider added successfully',
            'alert-type'=> 'success'
         );
        return redirect()->back()->with($notification); 
    }

    public function editSlider($id, EditSlider $editSlider)
    {
        $edit = $editSlider->handle($id);
        return $edit;
    }

    public function delSlider($id,DeleteSlider $deleteSlider)
    {
        $deleteSlider->handle($id);
        $notification = array(
            'message' => 'Slider deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateSlider(Request $request, UpdateSlider $updateSlider)
    {
        $updateSlider->handle($request);
        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type'=> 'success'
         );
        return redirect()->route('view.slider')->with($notification);

    }

    public function inactiveSlider($id, InactiveSlider $inactiveSlider)
    {
        $inactive = $inactiveSlider->handle($id);
        return $inactive;
    }

    public function activeSlider($id, ActiveSlider $activeSlider)
    {
        $active = $activeSlider->handle($id);
        return $active;
    }
}
