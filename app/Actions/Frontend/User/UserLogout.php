<?php

namespace App\Actions\Frontend\User;

use Illuminate\Support\Facades\Auth;
class UserLogout
{
    public function handle()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
