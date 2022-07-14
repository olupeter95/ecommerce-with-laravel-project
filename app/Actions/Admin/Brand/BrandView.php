<?php 
namespace App\Actions\Admin\Brand;

use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
 
class BrandView 
{
    public function handle()
    {
        $id = Auth::id();
        $admin = Admin::find($id);
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('admin','brands'));
    }


}

?>