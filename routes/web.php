<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\frontend\LanguageController;
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


/*-----------------User ROUTE------------------*/
Route::get('/', [IndexController::class,'index'])->name('home');
Route::get('logout/user', [IndexController::class,'UserLogout'])->name('user.logout');
Route::get('profile/user', [IndexController::class,'UserProfile'])->name('user.profile');
Route::post('profile/user/update', [IndexController::class,'UserProfileUpdate'])->name('user.profile.update');
Route::get('change/user/pwd', [IndexController::class,'ChangePassword'])->name('change.user.password');
Route::post('user/update/password', [IndexController::class,'UpdatePassword'])->name('user.password.update');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});
/*-----------------End User ROUTE------------------*/

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
        $admins = Admin::find($id);
        return view('admin.pages.index',compact('admins'));
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






// All Admin Brands route
Route::prefix('brand')->group(function(){
    Route::get('/all',[BrandController::class,'index'])->name('all.brand')->middleware('auth:admin');
    Route::post('/add',[BrandController::class,'add'])->name('add.brand');
    Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit.brand')->middleware('auth:admin');
    Route::post('/update',[BrandController::class,'update'])->name('update.brand');
    Route::get('/delete/{id}',[BrandController::class,'delete'])->name('delete.brand')->middleware('auth:admin');
});
//End All Admin Brand Route

//Admin Category Controller
Route::prefix('category')->group(function(){
    Route::get('/all',[CategoryController::class, 'index'])->name('all.category')->middleware('auth:admin');
    Route::post('/add',[CategoryController::class,'add'])->name('add.category');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit.category')->middleware('auth:admin');
    Route::post('/update',[CategoryController::class,'update'])->name('update.category');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete.category')->middleware('auth:admin');
//Admin All subCategory route
Route::get('/sub/all',[SubCategoryController::class, 'index'])->name('all.subcategory')->middleware('auth:admin');
Route::post('/sub/add',[SubCategoryController::class,'add'])->name('add.subcategory');
Route::get('/sub/edit/{id}',[SubCategoryController::class,'edit'])->name('edit.subcategory')->middleware('auth:admin');
Route::post('/sub/update',[SubCategoryController::class,'update'])->name('update.subcategory');
Route::get('/sub/delete/{id}',[SubCategoryController::class,'delete'])->name('delete.subcategory')->middleware('auth:admin');
//Admin All SUb subCategory route
Route::get('/sub/sub/all',[SubSubCategoryController::class, 'index'])->name('all.subsubcategory')->middleware('auth:admin');
Route::post('/sub/sub/add',[SubSubCategoryController::class,'add'])->name('add.subsubcategory');
Route::get('/sub/sub/edit/{id}',[SubSubCategoryController::class,'edit'])->name('edit.subsubcategory')->middleware('auth:admin');
Route::post('/sub/sub/update',[SubSubCategoryController::class,'update'])->name('update.subsubcategory');
Route::get('/sub/sub/delete/{id}',[SubSubCategoryController::class,'delete'])->name('delete.subsubcategory');

Route::get('/subcategory/ajax/{category_id}',[SubSubCategoryController::class,'GetSubCategory']);
Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubSubCategoryController::class,'GetSubSubCategory']);
}); 
//End Admin Category Controller


//Admin product route
Route::prefix('product')->group(function(){
    Route::get('/all',[ProductController::class,'index'])->name('add.product')->middleware('auth:admin');
    Route::get('/manage',[ProductController::class,'viewProduct'])->name('view.product')->middleware('auth:admin');
    Route::post('/store',[ProductController::class,'addProduct'])->name('store.product');
    Route::get('/edit/{id}',[ProductController::class,'editProduct'])->name('edit.product')->middleware('auth:admin');
    Route::get('/delete/{id}',[ProductController::class,'delProduct'])->name('product.delete');
    Route::get('/deleteImg/{id}',[ProductController::class,'delMulImgProduct'])->name('product-del-multiimg');
    Route::post('/data/update',[ProductController::class,'updateProductData'])->name('update.product');
    Route::post('/img/update',[ProductController::class,'updateProductImg'])->name('update.product-img');
    Route::post('/thumbnail/update',[ProductController::class,'updateProductThumbnail'])->name('update.product-thumbnail');
    Route::get('/inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}',[ProductController::class,'ProductActive'])->name('product.active');
    Route::get('/details/{id}',[ProductController::class,'productDetails'])->name('admin.product.details')->middleware('auth:admin');
});
/////end admin product///


//Admin slider route///
Route::prefix('slider')->group(function(){
    Route::get('/manage',[SliderController::class,'viewSlider'])->name('view.slider')->middleware('auth:admin');
    Route::post('/store',[SliderController::class,'storeSlider'])->name('store.slider');
    Route::get('/edit/{id}',[SliderController::class,'editSlider'])->name('edit.slider')->middleware('auth:admin');
    Route::get('/delete/{id}',[SliderController::class,'delSlider'])->name('delete.slider');
    Route::post('/update',[SliderController::class,'updateSlider'])->name('update.slider');
    Route::get('/inactive/{id}',[SliderController::class,'inactiveSlider'])->name('slider.inactive');
    Route::get('/active/{id}',[SliderController::class,'activeSlider'])->name('slider.active');
});
/////end slider route///


////All frontend route /////
Route::get('/language/english',[LanguageController::class, 'English'])->name('english.language');
Route::get('/language/french',[LanguageController::class, 'French'])->name('french.language');
////End All frontend route /////



Route::get('/product/detail/{id}',[IndexController::class, 'prodDetails'])->name('product-details');
//end product details route//

// frontend product tags route//
Route::get('/product/tags/{tags}',[IndexController::class, 'prodTags'])->name('product-tags');
// end frontend product tags route//

// frontend product categories route//
Route::get('/product/subcat/{id}/{slug}',[IndexController::class, 'prodSubcat'])->name('subcat-product');
Route::get('/product/subsubcat/{id}/{slug}',[IndexController::class, 'prodSubSubcat'])->name('subsubcat-product');
// end frontend product tags route//
