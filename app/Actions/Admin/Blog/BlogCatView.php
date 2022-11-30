<?php

namespace App\Actions\Admin\Blog;

use App\Models\Admin;
use App\Models\BlogCategories;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class BlogCatView
{
    public function handle(): View|Factory
    {
        $id = Auth::id();
        $admin = Admin::findorFail($id);
        $categories = BlogCategories::all();
        return view('admin.blog.blogcategory', compact('admin', 'categories'));
    }
}