<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Admin\Blog\BlogCatView;
use App\Actions\Admin\Blog\StoreBlogCat;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogCategoryRequest;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Undocumented function
     *
     * @param BlogCatView $blogCatView
     * @return void
     */
    public function blogCatView(BlogCatView $blogCatView)
    {
        return $blogCatView->handle();
    }

    public function storeBlogCat(
        BlogCategoryRequest $request,
        StoreBlogCat $storeBlogCat
    )
    {
        return $storeBlogCat->handle($request);
    }
}
