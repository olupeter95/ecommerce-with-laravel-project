<?php

namespace App\Actions\Admin\Blog;

use App\Models\Admin;
use App\Models\BlogCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class NewBlogPost
{
    public function handle(): View|Factory
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $admins = Admin::all();
        $categories = BlogCategories::all();
        return view('admin.blog.new_blog_post', compact('admin', 'admins', 'categories'));
    }
}