<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
     public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $category = Category::latest()->get();
        return view('admin.category.index',compact('admins','category'));
    }

    public function add(Request $request){
        $validateData = $request->validate([
            'category_name_en'=>'required|max:255',
            'category_name_fr'=>'required|max:255',
            'category_icon'=>'required|max:2000'
        ],
        [
            'category_name_en.required'=>'category Name En is required',
            'category_name_en.max'=>'exceed maximum number of character',
            'category_name_fr.required'=>'category Name Fr is required',
            'category_name_fr.max'=>'exceed maximum number of character',
            'category_icon.required'=>'category Image is required',
            'category_icon.max'=>'Maximum file upload file size, is 2mb',
        ]);
        
        
       Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en'=>strtolower(str_replace('','_',$request->category_name_en)),
            'category_slug_fr'=>strtolower(str_replace('','_',$request->category_name_fr)),
            'category_icon' => $request->category_icon,
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
           'message' => 'category added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
   }
   
   public function edit($id){
    $aid = Auth::id();
    $admins = Admin::find($aid);
    $category = Category::find($id);
   return view('admin.category.edit',compact('category','admins'));
}

public function update(Request $request){
    $validateData = $request->validate([
        'category_name_en'=>'required|max:255',
        'category_name_fr'=>'required|max:255',
        'category_icon'=>'required|max:2000'
    ],
    [
        'category_name_en.required'=>'category Name En is required',
        'category_name_en.max'=>'exceed maximum number of character',
        'category_name_fr.required'=>'category Name Fr is required',
        'category_name_fr.max'=>'exceed maximum number of character',
        'category_icon.required'=>'category Image is required',
        'category_icon.max'=>'Maximum file upload file size, is 2mb',
    ]);
    
    $id = $request->id;
   Category::find($id)->update([
        'category_name_en' => $request->category_name_en,
        'category_name_fr' => $request->category_name_fr,
        'category_slug_en'=>strtolower(str_replace(' ','_',$request->category_name_en)),
        'category_slug_fr'=>strtolower(str_replace(' ','_',$request->category_name_fr)),
        'category_icon' => $request->category_icon,
        'created_at'=> Carbon::now()
    ]);
    $notification = array(
       'message' => 'category updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.category')->with($notification);
}

public function delete($id){
    Category::findOrFail($id)->delete();
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

}
