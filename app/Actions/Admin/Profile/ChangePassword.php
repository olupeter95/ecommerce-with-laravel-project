<?php 

namespace App\Actions\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminProfile\ChangePasswordRequest;

class ChangePassword 
{
    public function handle(ChangePasswordRequest $request, $id)
    {
        $current_pwd = Admin::find($id)->password;
        if(Hash::check($request->oldpwd,$current_pwd)){
           $newpwd = Hash::make($request->pwd);
            return Admin::find($id)->update([
                'password' => $newpwd
            ]); 
        }
    }
}
