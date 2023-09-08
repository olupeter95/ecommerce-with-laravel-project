<?php

namespace App\Actions\Admin\Blog;

use App\Models\Blog;
use App\Http\Requests\Blog\StoreBlogRequest;

class StoreBlogPost
{
    public function handle(StoreBlogRequest $request)
    {
        dd($request->author_id);
        Blog::create([
            'category_id' => $request->category_id,
        ]);
    }
}