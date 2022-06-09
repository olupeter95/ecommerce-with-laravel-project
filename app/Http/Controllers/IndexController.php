<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Image;

class IndexController extends Controller
{
    //
    public function index(){
        return view('layouts.pages.home');
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
}
