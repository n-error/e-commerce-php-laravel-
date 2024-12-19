<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
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

/*Route::get('/', function () {
    return view('frontend.welcome');
});*/

//backend route
Route::get('/admins',[AdminController::class,'index']);
Route::post('//admin-dashboard',[AdminController::class,'show_dashboard']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout']);
//category route
Route::resource('/categories',CategoryController::class);
Route::get('/cat-status{category}',[CategoryController::class,'change_status']);
//subcategory route
Route::resource('/sub-categories',SubCategoryController::class);
Route::get('/subcat-status{subcategory}',[SubCategoryController::class,'change_status']);
//brand route
Route::resource('/brands',BrandController::class);
Route::get('/brand-status{brand}',[BrandController::class,'change_status']);
//uni route
Route::resource('/units',UnitController::class);
Route::get('/unit-status{unit}',[UnitController::class,'change_status']);
//size route
Route::resource('/sizes',SizeController::class);
Route::get('/size-status{size}',[SizeController::class,'change_status']);
//color route
Route::resource('/colors',ColorController::class);
Route::get('/color-status{color}',[ColorController::class,'change_status']);
//product route
Route::resource('/products',ProductController::class);
Route::get('/product-status{product}',[ProductController::class,'change_status']);
//frontend route
Route::get('/',[HomeController::class,'index']);
Route::get('/view-details{id}',[HomeController::class,'view_details']);
Route::get('/product_by_cat{id}',[HomeController::class,'product_by_cat']);
Route::get('/product_by_subcat{id}',[HomeController::class,'product_by_subcat']);
Route::get('/product_by_brand{id}',[HomeController::class,'product_by_brand']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search',[HomeController::class,'search']);
//cart route
Route::post('/add-to-cart',[CartController::class,'add_to_cart']);
Route::get('/delete-cart{id}',[CartController::class,'delete']);
//checkout route
Route::get('/checkout',[CheckoutController::class,'index']);
Route::get('/login-check',[CheckoutController::class,'login_check']);
//order route
Route::get('/manage-order',[OrderController::class,'manage_order']);
Route::get('/view-order{id}',[OrderController::class,'view_order']);
//customer log in, regestration,log out route
Route::post('/customer-login',[CustomerController::class,'login']);
Route::post('/customer-registration',[CustomerController::class,'registration']);
Route::get('/cus-logout',[CustomerController::class,'logout']);
Route::post('/save-shipping-address',[CheckoutController::class,'save_shipping_address']);
Route::get('/payment',[CheckoutController::class,'payment']);
Route::post('/order-place',[CheckoutController::class,'order_place']);


Route::post('products/review/{id}',[ProductController::class, 'saveReview'])->name('review.save');
Auth::routes();
