<?php

namespace App\Actions\Frontend\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserProfile
{
    public function handle()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profile.show', compact('user'));
    }
}
