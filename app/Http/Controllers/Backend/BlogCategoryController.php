<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Admin\Blog\BlogCatView;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function blogCatView(BlogCatView $blogCatView)
    {
        return $blogCatView->handle();
    }
}
