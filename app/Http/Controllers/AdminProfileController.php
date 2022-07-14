<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Actions\Admin\Profile\UpdateProfile;
use App\Actions\Admin\Profile\ChangePassword;
use App\Http\Requests\AdminProfile\UpdateAdminRequest;
use App\Http\Requests\AdminProfile\ChangePasswordRequest;


class AdminProfileController extends Controller
{
     public function Profile($id){
        $admin = Admin::find($id);
        return view('admin.pages.profile',compact('admin'));
    }

    public function ProfileEdit($id){
        $admin = Admin::find($id);
        return view('admin.pages.profile_edit',compact('admin'));
    }
    
    public function ProfileUpdate(UpdateAdminRequest $request, $id, UpdateProfile  $updateProfile){
        $updateProfile->handle($request, $id);
                 $notification = array(
                'message' => 'brand update successfully',
                'alert-type'=> 'success'
             );
              return redirect()->route('admin.profile',[$id])->with($notification);
        
    }

    public function PasswordChange($id)
    {
        $admin = Admin::find($id);
        return view('admin.admin_changepwd',compact('admin'));
    }

    public function NewPwd(ChangePasswordRequest $request, $id, ChangePassword $changePassword){
       $changePassword->handle($request, $id);
       Auth::logout();
       return redirect()->route('admin.logout');
    }
}
