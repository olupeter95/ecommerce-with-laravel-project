<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\AdminProfileController;

Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login',[AdminController::class, 'loginForm']);
    Route::post('admin/login',[AdminController::class, 'store'])->name('admin.login');
});
Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('/admin/user')->group(function (){
        Route::get('/view', [AdminUserController::class, 'allUsers'])->name('all-users');
    });
    Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified',
    ])->group(function () {
        Route::get(
            '/admin/dashboard', [AdminController::class, 'index'])->name('admin.body');
     });
    Route::get(
        'admin/logout',[AdminController::class,'destroy']
    )->name('admin.logout');
    Route::get(
        'admin/profile/{id}',[AdminProfileController::class, 'profile']
    )->name('admin.profile');
    Route::get(
        'admin/profile/edit/{id}',
        [AdminProfileController::class,'profileEdit']
    )->name('admin.profile.edit');

    Route::post(
        'admin/profile/update/{id}',
        [AdminProfileController::class,'profileUpdate']
    )->name('admin.profile.update');

    Route::get(
        'admin/change/password/{id}',
        [AdminProfileController::class,'passwordChange']
    )->name('admin.pwd.reset');

    Route::post(
        'admin/create/newpassword/{id}',
        [AdminProfileController::class,'newPwd']
    )->name('admin.change.password');
});
