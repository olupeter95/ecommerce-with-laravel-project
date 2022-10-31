<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AllUser
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.user.all_user', compact('users', 'admin'));
    }
}