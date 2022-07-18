<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Models\Admin;

/*-----------------ADMiN ROUTE------------------*/
Route::middleware('admin:admin')->group(function (){
    Route::get('admin/login',[AdminController::class,'loginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
    
});
Route::middleware(['auth:admin'])->group(function(){
Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        $id = Auth::id();
        $admin = Admin::find($id);
        return view('admin.pages.index',compact('admin'));
    })->name('admin.body');
});
Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile/{id}',[AdminProfileController::class,'Profile'])->name('admin.profile');
Route::get('admin/profile/edit/{id}',[AdminProfileController::class,'ProfileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/update/{id}',[AdminProfileController::class,'ProfileUpdate'])->name('admin.profile.update');
Route::get('admin/change/password/{id}',[AdminProfileController::class,'PasswordChange'])->name('admin.pwd.reset');
Route::post('admin/create/newpassword/{id}',[AdminProfileController::class,'NewPwd'])->name('admin.change.password');
});
/*-----------------END ADMiN ROUTE--------------*/
?>