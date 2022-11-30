<?php

namespace App\Actions\Admin\Blog;

use App\Http\Requests\Blog\BlogCategoryRequest;
use App\Models\BlogCategories;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class StoreBlogCat
{
    public function handle(BlogCategoryRequest $request): Redirector|RedirectResponse
    {
        BlogCategories::create([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Blog Category Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}