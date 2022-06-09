<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\SubCategory;
use App\Models\Category;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $subcategory = SubCategory::latest()->get();
        $category = Category::all();
        return view('admin.subcategory.index',compact('admins','subcategory','category'));
    }

    public function add(Request $request){
        $validateData = $request->validate([
            'category_id'=>'required',
            'subcategory_name_en'=>'required|max:255',
            'subcategory_name_fr'=>'required|max:255',
        ],
        [
            'category_id'=>'category is required',
            'subcategory_name_en.required'=>'category Name En is required',
            'subcategory_name_en.max'=>'exceed maximum number of character',
            'subcategory_name_fr.required'=>'category Name Fr is required',
            'subcategory_name_fr.max'=>'exceed maximum number of character',
        ]);
        
        
       SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_fr' => $request->subcategory_name_fr,
            'subcategory_slug_en'=>strtolower(str_replace('','_',$request->subcategory_name_en)),
            'subcategory_slug_fr'=>strtolower(str_replace('','_',$request->subcategory_name_fr)),
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
           'message' => 'Subcategory added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
   }
   
   public function edit($id){
    $aid = Auth::id();
    $admins = Admin::find($aid);
    $category = Category::all();
    $subcategory = SubCategory::find($id);
   return view('admin.subcategory.edit',compact('category','admins','subcategory'));
}

public function update(Request $request){
    $validateData = $request->validate([
        'category_id'=>'required',
        'subcategory_name_en'=>'required|max:255',
        'subcategory_name_fr'=>'required|max:255',
    ],
    [
        'category_id'=>'category is required',
        'subcategory_name_en.required'=>'category Name En is required',
        'subcategory_name_en.max'=>'exceed maximum number of character',
        'subcategory_name_fr.required'=>'category Name Fr is required',
        'subcategory_name_fr.max'=>'exceed maximum number of character',
    ]);
    
    $id = $request->id;
    SubCategory::find($id)->update([
    'category_id' => $request->category_id,
    'subcategory_name_en' => $request->subcategory_name_en,
    'subcategory_name_fr' => $request->subcategory_name_fr,
    'subcategory_slug_en'=>strtolower(str_replace('','_',$request->subcategory_name_en)),
    'subcategory_slug_fr'=>strtolower(str_replace('','_',$request->subcategory_name_fr)),
    'created_at'=> Carbon::now()
    ]);
    $notification = array(
       'message' => 'Subcategory updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.subcategory')->with($notification);
}

public function delete($id){
    SubCategory::findOrFail($id)->delete();
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

}
