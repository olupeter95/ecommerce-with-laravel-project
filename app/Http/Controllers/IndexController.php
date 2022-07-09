<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Actions\Frontend\UpdateUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Actions\Frontend\UpdatePassword;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdatePasswordRequest;

class IndexController extends Controller
{
    //
    public function home(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    }


    public function index(){
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(5)->get();
        $skip_category = Category::skip(0)->first();
        $skip_product = Product::where('status',1)->where('category_id',
        $skip_category->id)->orderBy('id','DESC')->get();
       // return $skip_category->id;
        //die();
        return view('layouts.pages.home',compact('sliders','categories','products','featured',
        'skip_category','skip_product'));
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profile.show',compact('user'));
    }

    public function UserProfileUpdate(UpdateUserRequest $request, UpdateUser $updateUser){
        $updateUser->handle($request);
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type'=> 'success'
         );
         return redirect()->route('dashboard')->with($notification);
    }

    public function ChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profile.update-password-form',compact('user'));
    }

    public function UpdatePassword(UpdatePasswordRequest $request, UpdatePassword $updatePassword){
        $updatePassword->handle($request);
        Auth::logout();
       return redirect()->route('login');
    }

    public function prodDetails($id){
        $products = Product::findorFail($id);
        $color_en = $products->product_color_en;
        $prod_color_en = explode(',',$color_en);
        $color_fr = $products->product_color_fr;
        $prod_color_fr = explode(',',$color_fr );
        $prod_size_en = explode(',',$products->product_size_en);
        $prod_size_fr = explode(',',$products->product_size_fr);
        $multImg = MultiImage::where('product_id',$id)->orderBy('photo_name','ASC')->get();
        $cat_id = $products->category_id;
        $relatedProd = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        return view('layouts.pages.product-detail',compact('products','multImg','prod_color_en',
    'prod_color_fr','prod_size_en','prod_size_fr','relatedProd'));
    }

    public function prodTags($tags){
        $prod = Product::where('status',1)->where('product_tags_en',$tags)->orWhere(
            'product_tags_fr',$tags)->orderBy('id','DESC')->paginate(3);
        $prod_color_en = Product::where('product_tags_en',$tags)->select('product_color_en')->get();
        $color_en =explode(',',$prod_color_en);
        $color_fr = explode(',',Product::groupBy('product_color_fr')->select('product_color_fr')->get());
            return view('layouts.tags.view',compact('prod','color_en', 'color_fr'));
    }

    public function prodSubcat($id, $slug){
        $prod = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        return view('layouts.categories.subcat-view',compact('prod'));
    }

    public function prodSubSubcat($id, $slug){
        $prod = Product::where('status',1)->where('subsubcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        return view('layouts.categories.subsubcat-view',compact('prod'));
    }
}
