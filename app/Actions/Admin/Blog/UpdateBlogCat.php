<?php

namespace App\Actions\Admin\Blog;

use Carbon\Carbon;
use App\Models\BlogCategories;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Blog\BlogCategoryRequest;

class UpdateBlogCat
{
    public function handle(BlogCategoryRequest $request): RedirectResponse
    {
        $id = $request->id;
        BlogCategories::findorFail($id)->update([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success',
        ];
        return to_route('blog.category')->with($notification);
    }
}