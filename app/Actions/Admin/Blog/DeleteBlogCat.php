<?php

namespace App\Actions\Admin\Blog;

use App\Models\BlogCategories;

class DeleteBlogCat
{
    public function handle(int $id)
    {
        BlogCategories::findorFail($id)->delete();
        $notification = [
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}