<?php
namespace App\Actions\Frontend\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdatePasswordRequest;

class UpdatePassword 
{
    public function handle(UpdatePasswordRequest $request): Bool
    {
        $newpwd = Hash::make($request->password);
        $user = User::find(Auth::user()->id)->update([
            'password'=>$newpwd
       ]);  
       return $user; 
    }
}
?>