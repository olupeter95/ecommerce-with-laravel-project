<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Actions\Admin\Blog\AllBlog;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Blog\NewBlogPost;
use App\Actions\Admin\Blog\StoreBlogPost;
use App\Http\Requests\Blog\StoreBlogRequest;

class BlogPostController extends Controller
{
    /**
     * Undocumented function
     *
     * @param AllBlog $allBlog
     * @return void
     */
    public function allBlog(AllBlog $allBlog)
    {
        return $allBlog->handle();
    }

    /**
     * Undocumented function
     *
     * @param NewBlogPost $newBlogPost
     * @return void
     */
    public function newBlogPost(NewBlogPost $newBlogPost)
    {
        return $newBlogPost->handle();
    }

    public function storeBlogPost(
        StoreBlogRequest $request,
        StoreBlogPost $storeBlogPost
    )
    {
        return $storeBlogPost->handle($request);        
    }
}
