<?php

namespace App\Actions\Admin\Blog;

use App\Models\Blog;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;

class AllBlog
{
    public function handle(): View|Factory
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $blogs = Blog::latest()->get();
        return view('admin.blog.view_all_blog', compact('blogs', 'admin'));
    }
}