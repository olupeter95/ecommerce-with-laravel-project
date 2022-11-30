<?php

namespace App\Actions\Admin\Blog;

use App\Models\Admin;
use App\Models\BlogCategories;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;

class EditBlogCat
{
    public function handle(int $id): View|Factory
    {
        $adminId = Auth::id();
        $admin = Admin::findorFail($adminId);
        $category = BlogCategories::findorFail($id);
        return view('admin.blog.edit_blogcategory', compact('category', 'admin'));
    }
}