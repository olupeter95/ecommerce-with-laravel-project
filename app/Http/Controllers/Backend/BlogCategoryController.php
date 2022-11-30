<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Admin\Blog\BlogCatView;
use App\Actions\Admin\Blog\DeleteBlogCat;
use App\Actions\Admin\Blog\EditBlogCat;
use App\Actions\Admin\Blog\StoreBlogCat;
use App\Actions\Admin\Blog\UpdateBlogCat;
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

    /**
     * Undocumented function
     *
     * @param int $id
     * @param EditBlogCat $editBlogCat
     * @return void
     */
    public function editBlogCat(
        int $id,
        EditBlogCat $editBlogCat
    )
    {
        return $editBlogCat->handle($id);
    }

    /**
     * Undocumented function
     *
     * @param BlogCategoryRequest $request
     * @param UpdateBlogCat $updateBlogCat
     * @return void
     */
    public function updateBlogCat(
        BlogCategoryRequest $request,
        UpdateBlogCat $updateBlogCat
    )
    {
        return $updateBlogCat->handle($request);
    }

    public function deleteBlogCat(
        int $id,
        DeleteBlogCat $deleteBlogCat
    )
    {
        return $deleteBlogCat->handle($id);
    }
}
