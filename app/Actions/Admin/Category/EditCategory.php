<?php 
namespace App\Actions\Admin\Category;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EditCategory
{
    public function handle($id)
    {
        $aid = Auth::id();
        $admin = Admin::find($aid);
        $category = Category::find($id);
        return view('admin.category.edit',compact('category','admin'));
    }
}
?>