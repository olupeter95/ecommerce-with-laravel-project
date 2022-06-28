<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Image;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\MultiImage;

class IndexController extends Controller
{
    //
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
        return view('layouts.pages.home',compact('sliders','categories','products','featured','skip_category','skip_product'));
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

    public function UserProfileUpdate(Request $request){
        $validateData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone'=>'required',
            'image'=>'mimes:jpg,png|max:4000'
        ],
        [
            'name.required'=>'name field is required',
            'name.max'=>'exceeded maximum character',
            'email.required'=>'email field is required',
            'phone.required'=>'Phone field is required',
            'email.email'=>'this is not a valid email address',
            'image.mimes'=>'only file of type jpg,and png can be uploaded',
            'image.max'=>'only file of type jpg,and png can be uploaded'
        ]);
        $file = $request->file('image');
        $data = User::find(Auth::user()->id);
        if($file){ 
            
            Storage::delete('/public/upload/user_image/'.$data->profile_photo_path);
            $img = Image::make($file);
            $img->resize(300,200);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/user_image/'.$name); 
            $data->update([
                'name' => $request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                 'profile_photo_path' => $name,
                 'created_at'=> Carbon::now()
            ]);
            $notification = array(
                'message' => 'User profile updated successfully',
                'alert-type'=> 'success'
             );
             return redirect()->route('dashboard')->with($notification);
        }else{
            $data->update([
                'name' => $request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                 'created_at'=> Carbon::now()
            ]);
            $notification = array(
                'message' => 'User update successfully',
                'alert-type'=> 'success'
             );
              return redirect()->route('dashboard')->with($notification);
        }
    }

    public function ChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profile.update-password-form',compact('user'));
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'current_password'=>'required|current_password',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ],
        [
            'current_password.required'=>'Currrent Password field required',
            'current_password.current_password'=>'incorrect password',
            'password.required'=>'Password field required',
            'password.confirmed'=>'Password do not match',
            'password_confirmation'=>'Password Confimation field required'
        ]);
        $newpwd = Hash::make($request->passwor);
        User::find(Auth::user()->id)->update([
            'password'=>$newpwd
       ]);
       Auth::logout();
       return redirect()->route('login');
    }

    public function prodDetails($id){
        $products = Product::findorFail($id);
        $multImg = MultiImage::where('product_id',$id)->orderBy('photo_name','ASC')->get();
        return view('layouts.pages.product-detail',compact('products','multImg'));
    }
}
