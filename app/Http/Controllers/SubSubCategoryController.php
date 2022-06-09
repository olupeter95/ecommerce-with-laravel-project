<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use Carbon\Carbon;

class SubSubCategoryController extends Controller
{
    //
    public function index(){
        $id = Auth::id();
        $admins = Admin::find($id);
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $category = Category::all();
        return view('admin.subsubcategory.index',compact('admins','subcategory','category','subsubcategory'));
    }

    public function add(Request $request){
        $validateData = $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_en'=>'required|max:255',
            'subsubcategory_name_fr'=>'required|max:255',
        ],
        [
            'category_id'=>'category is required',
            'subcategory_id'=>'category is required',
            'subsubcategory_name_en.required'=>'category Name En is required',
            'subsubcategory_name_en.max'=>'exceed maximum number of character',
            'subsubcategory_name_fr.required'=>'category Name Fr is required',
            'subsubcategory_name_fr.max'=>'exceed maximum number of character',
        ]);
        
           SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
            'subsubcategory_slug_en'=>strtolower(str_replace('','_',$request->subsubcategory_name_en)),
            'subsubcategory_slug_fr'=>strtolower(str_replace('','_',$request->subsubcategory_name_fr)),
            'created_at'=> Carbon::now()
        ]);
        $notification = array(
           'message' => 'Sub Subcategory added successfully',
           'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
   }
   
   public function edit($id){
    $aid = Auth::id();
    $admins = Admin::find($aid);
    $category = Category::all();
    $subcategory = SubCategory::all();
    $subsubcategory = SubSubCategory::find($id);
   return view('admin.subsubcategory.edit',compact('category','admins','subcategory','subsubcategory'));
}

public function update(Request $request){
    $validateData = $request->validate([
        'category_id'=>'required',
        'subcategory_id'=>'required',
        'subsubcategory_name_en'=>'required|max:255',
        'subsubcategory_name_fr'=>'required|max:255',
    ],
    [
        'category_id'=>'category is required',
        'subcategory_id'=>'subcategory is required',
        'subsubcategory_name_en.required'=>'category Name En is required',
        'subsubcategory_name_en.max'=>'exceed maximum number of character',
        'subsubcategory_name_fr.required'=>'category Name Fr is required',
        'subsubcategory_name_fr.max'=>'exceed maximum number of character',
    ]);
    
    $id = $request->id;
    SubSubCategory::find($id)->update([
    'category_id' => $request->category_id,
    'subcategory_id' => $request->subcategory_id,
    'subsubcategory_name_en' => $request->subsubcategory_name_en,
    'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
    'subsubcategory_slug_en'=>strtolower(str_replace('','_',$request->subsubcategory_name_en)),
    'subsubcategory_slug_fr'=>strtolower(str_replace('','_',$request->subsubcategory_name_fr)),
    'created_at'=> Carbon::now()
    ]);
    $notification = array(
       'message' => 'Subcategory updated successfully',
       'alert-type'=> 'success'
    );
    return redirect()->route('all.subsubcategory')->with($notification);
}

    public function delete($id){
    SubSubCategory::findOrFail($id)->delete();
    $notification = array(
      'message' => 'category deleted successfully',
      'alert-type'=> 'error'
   );
   return redirect()->back()->with($notification);
  }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
     	return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
     	return json_encode($subsubcat);
    }

}
