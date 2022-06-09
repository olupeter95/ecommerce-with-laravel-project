<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminProfileController extends Controller
{

    

    public function Profile($id){
        $admins = Admin::find($id);
        return view('admin.pages.profile',compact('admins'));
    }

    public function ProfileEdit($id){
        $admins = Admin::find($id);
        return view('admin.pages.profile_edit',compact('admins'));
    }
    
    public function ProfileUpdate(Request $request, $id){
        $validateData = $request->validate([
            'name'=>'max:255',
            'email'=>'email',
            'profile_photo_path'=>'mimes:jpg,png|max:4000'
        ],
        [
            'name.required'=>'name field is required',
            'name.max'=>'exceeded maximum character',
            'email.required'=>'email field is required',
            'email.email'=>'this is not a valid email address',
            'profile_photo_path.mimes'=>'only file of type jpg,and png can be uploaded',
            'profile_photo_path.max'=>'only file of type jpg,and png can be uploaded'
        ]);
        $file = $request->file('profile_photo_path');
        $admins = Admin::find($id);
        if($file){ 
            Storage::delete('/public/upload/admin_image/'.$admins->profile_photo_path);
            $img = Image::make($file);
            $img->resize(300,200);
            $name = $file->getClientOriginalName();
            $img->save('storage/upload/admin_image/'.$name); 
            $update = Admin::find($id)->update([
                'name' => $request->name,
                'email'=>$request->email,
                 'profile_photo_path' => $name,
                 'created_at'=> Carbon::now()
            ]);
            $notification = array(
                'message' => 'Admin profile updated successfully',
                'alert-type'=> 'success'
             );
             return redirect()->route('admin.profile',[$id])->with($notification);
        }else{
            $update = Admin::find($id)->update([
                'name' => $request->name,
                'email'=>$request->email,
                 'created_at'=> Carbon::now()
            ]);
            $notification = array(
                'message' => 'brand update successfully',
                'alert-type'=> 'success'
             );
              return redirect()->route('admin.profile',[$id])->with($notification);
        }
    }

    public function PasswordChange($id)
    {
        $admins = Admin::find($id);
        return view('admin.admin_changepwd',compact('admins'));
    }

    public function NewPwd(Request $request, $id){
        $validateData = $request->validate([
            'oldpwd'=>'required',
            'pwd'=>'required|confirmed',
            'pwd_confirmation'=>'required'
        ],
        [
            'oldpwd.required'=>'Currrent Password field required',
            'pwd.required'=>'New Password field required',
            'pwd.confirmed'=>'Password do not match',
        ]);

        $current_pwd = Admin::find($id)->password;
        if(hash::check($request->oldpwd,$current_pwd)){
            $newpwd = Hash::make($request->pwd);
            Admin::find($id)->update([
                 'password'=>$newpwd
            ]);
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
