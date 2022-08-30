<?php

namespace App\Actions\Frontend\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChangeUserPwd
{
    public function handle()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profile.update-password-form', compact('user'));
    }
}
