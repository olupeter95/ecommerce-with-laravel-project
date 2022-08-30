<?php

namespace App\Actions\Frontend\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdatePasswordRequest;
class UpdatePassword 
{
    public function handle(UpdatePasswordRequest $request): bool
    {
        $newpwd = Hash::make($request->password);
        return User::find(Auth::user()->id)->update([
            'password' => $newpwd
        ]); 
    }
}
