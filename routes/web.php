<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\IndexController;
use App\Models\Admin;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('logout/user', [IndexController::class,'UserLogout'])->name('user.logout');
Route::get('profile/user', [IndexController::class,'UserProfile'])->name('user.profile');
Route::post('profile/user/update', [IndexController::class,'UserProfileUpdate'])->name('user.profile.update');
Route::get('change/user/pwd', [IndexController::class,'ChangePassword'])->name('change.user.password');
Route::post('user/update/password', [IndexController::class,'UpdatePassword'])->name('user.password.update');
/*-----------------ADMiN ROUTE------------------*/
Route::middleware('admin:admin')->group(function (){
    Route::get('admin/login',[AdminController::class,'loginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
    
   
});

Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        $admins = Auth::user();
        return view('admin.pages.index',compact('admins'));
    })->name('admin.body')->middleware('auth:admin');
});

Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile/{id}',[AdminProfileController::class,'Profile'])->name('admin.profile');
Route::get('admin/profile/edit/{id}',[AdminProfileController::class,'ProfileEdit'])->name('admin.profile.edit');
Route::post('admin/profile/update/{id}',[AdminProfileController::class,'ProfileUpdate'])->name('admin.profile.update');
Route::get('admin/change/password/{id}',[AdminProfileController::class,'PasswordChange'])->name('admin.pwd.reset');
Route::post('admin/create/newpassword/{id}',[AdminProfileController::class,'NewPwd'])->name('admin.change.password');
/*-----------------END ADMiN ROUTE--------------*/


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});
