<?php 
namespace App\Actions\Admin\Brand;

use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class EditBrand 
{
    public function handle($id) 
    {
        $adminId = Auth::id();
        $admin = Admin::find($adminId);
        $brands = Brand::find($id);
       return view('admin.brand.edit',compact('brands','admin'));
    }
}
?>