<?php 
namespace App\Actions\Admin\Category;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryView 
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $category = Category::latest()->get();
        return view('admin.category.index',compact('admin','category'));
    }
}
?>