<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Admin;
use Image;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function viewSlider(){
        $aid = Auth::id();
        $admins = Admin::find($aid);
        $sliders = Slider::latest()->get();
        return view('admin.slider.view',compact('admins','sliders'));
    }

    public function storeSlider(Request $request){
        $validateData = $request->validate([
            'slider_img'=>'required'
        ],
        [
            'slider_img.required'=>'Image field is required'
        ]);
        $file = $request->file('slider_img');
        $img = Image::make($file);
        $img->resize(870,370);
        $name = $file->getClientOriginalName();
        $img->save('storage/upload/slider/'.$name);
        Slider::insert([
            'title_en'=>$request->title_en,
            'title_fr'=>$request->title_fr,
            'description_en'=>$request->description_en,
            'description_fr'=>$request->description_fr,
            'slider_img' => $name,
            'status'=>0,
            'created_at' => Carbon::now()
        ]);
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

    public function delSlider($id){
        $slide = Slider::findorFail($id);
        Storage::delete('public/upload/slider/'.$slide->slider_img);
        Slider::findorFail($id)->delete();
        $notification = array(
            'message' => 'Slider deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateSlider(Request $request){
        $id = $request->id;
        $old_img = $request->old_image;
        $file = $request->file('slider_img');
        if($file){
            Storage::delete('/public/upload/slider/'.$old_img->slider_img);
            $img = Image::make($file);
            $img->resize(870,370);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/slider/'.$name);
            Slider::findorFail($id)->update([
                'title_en'=>$request->title_en,
                'title_fr'=>$request->title_fr,
                'description_en'=>$request->description_en,
                'description_fr'=>$request->description_fr,
                'slider_img' => $name,
                'status'=>0,
                'created_at' => Carbon::now()
            ]);
        }else{
            Slider::findorFail($id)->update([
                'title_en'=>$request->title_en,
                'title_fr'=>$request->title_fr,
                'description_en'=>$request->description_en,
                'description_fr'=>$request->description_fr,
                'status'=>0,
                'created_at' => Carbon::now()
            ]);
        }
        
     
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
