<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Actions\Admin\Blog\AllBlog;
use App\Http\Controllers\Controller;
use App\Actions\Admin\Blog\NewBlogPost;

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

    public function newBlogPost(NewBlogPost $newBlogPost)
    {
        return $newBlogPost->handle();
    }
}
