<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;

/*-----------------User ROUTE------------------*/
Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('logout/user', [IndexController::class,'UserLogout'])->name('user.logout');
Route::get('profile/user', [IndexController::class,'UserProfile'])->name('user.profile');
Route::post('profile/user/update', [IndexController::class,'UserProfileUpdate'])->name('user.profile.update');
Route::get('change/user/pwd', [IndexController::class,'ChangePassword'])->name('change.user.password');
Route::post('user/update/password', [IndexController::class,'UpdatePassword'])->name('user.password.update');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'home'])->name('dashboard');
});
/*-----------------End User ROUTE------------------*/ 

Route::get('/product/detail/{id}',[IndexController::class, 'prodDetails'])->name('product-details');
//end product details route//

// frontend product tags route//
Route::get('/product/tags/{tags}',[IndexController::class, 'prodTags'])->name('product-tags');
// end frontend product tags route//

// frontend product categories route//
Route::get('/product/subcat/{id}/{slug}',[IndexController::class, 'prodSubcat'])->name('subcat-product');
Route::get('/product/subsubcat/{id}/{slug}',[IndexController::class, 'prodSubSubcat'])->name('subsubcat-product');
// end frontend product tags route//

//product modal view
Route::get('/product/view/modal/{id}',[IndexController::class, 'ProductModalView']);

?>