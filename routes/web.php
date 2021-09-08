<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//frontedn classes
use App\Http\Controllers\Frontend\IndexController ;
use App\Http\Controllers\Frontend\CartController ;
use App\Http\Controllers\Frontend\OrderController ;
use App\Http\Controllers\Frontend\UserController ;
use App\Http\Controllers\Auth\LoginController ;
use Laravel\Socialite\Facades\Socialite;

// admin classes
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\ShipmentInfoController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\SubCityController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\Admin\DebitController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController as backendOrderController;


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



Route::get('/', [IndexController::class, 'index']);
Route::get('product/{slug}', [IndexController::class, 'product'])->name('product');
Route::get('{slug}', [IndexController::class, 'categoryWiseProduct'])->name('category_product');
Route::get('collections/{slug}', [IndexController::class, 'subCategoryWiseProduct'])->name('sub_category_product');
Route::get('product/collections/{slug}', [IndexController::class, 'subSubCategoryWiseProduct'])->name('sub_sub_category_product');

//authenticates routes
Route::group([ 'middleware' => ['auth','authuser'] ], function(){
    Route::resources([
        'order' => OrderController::class ,
    ]);
    //order routes
    Route::view('user/profile', 'frontend.user.profile')->name('profile');
    Route::view('new/password','frontend.user.new_password') ;
    Route::view('change/password','frontend.user.change_password') ;
    Route::post('api/user/profile/info/edit',[UserController::class,'updateProfile'])->name('profile_update');
    Route::post('api/user/password/update',[UserController::class,'updatePassword'])->name('change_password');
    Route::post('api/user/set/new/password',[UserController::class,'setNewPassword'])->name('set_new_password');
    Route::get('customer/order/list', [OrderController::class, 'orderList'])->name('orders');
    Route::get('customer/order/details/{id}', [OrderController::class, 'orderDetails'])->name('order');
    Route::get('api/city/wise/sub/city/{id}', [OrderController::class, 'subCities']);

});
//request product 
Route::view('request/for/product','frontend.request_product') ;
Route::post('api/request/product',[ProductController::class,'requestForProduct'])->name('request_product') ;
//cart routes
Route::get('cart/view', [CartController::class, 'viewCart'])->name('cart_view');
Route::post('api/add/cart/{id}', [CartController::class, 'addCart'])->name('cart_add');
Route::post('api/cart/item/update', [CartController::class, 'cartUpdate'])->name('cart_update');
Route::get('api/cart/remove/{rowId}', [CartController::class, 'cartDestroy'])->name('cart_remove');
Route::get('api/cart/content', [CartController::class, 'cartContent'])->name('cart_content');
//user and customer routes 
Route::post('api/user/registration', [LoginController::class, 'userRegistration'])->name('user_registration');
//otp login routes
Route::get('/otp/login', function () {
     return view('frontend.user.otp_login');
});
Route::post('api/send/otp/code', [LoginController::class, 'sendOtp'])->name('send_otp');
Route::post('api/verify/otp/code', [LoginController::class, 'verifyOtpCode'])->name('verify_otp');
//socialite login routes 
Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/login/facebook/callback', function () {
            $user = Socialite::driver('facebook')->user();
            $user->getId();
            $user->getNickname();
            return  $user->getName();
            $user->getEmail();
            $user->getAvatar();

});

Route::get('auth/google', function(){
      return Socialite::driver('google')->redirect();
});
Route::get('auth/google/callback', function(){
        
            $user = Socialite::driver('google')->user();
            return $user ;
            $user->getId();
            $user->getNickname();
            $user->getName();
            $user->getEmail();
            $user->getAvatar();
});


Auth::routes();
//start admin route
Route::group([
    'prefix' => 'admin/',
    'middleware' => 'admin',
], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');

    //resoure route
    Route::resources([
        'page' =>       PageController::class,
        'brand' =>      BrandController::class,
        'slider' =>     SliderController::class,
        'banner' =>     BannerController::class,
        'credit' =>     CreditController::class,
        'debit' =>      DebitController::class,
        'balance' =>    BalanceController::class,
        'category' =>   CategoryController::class,
        'sub_category' => SubCategoryController::class,
        'sub_sub_category' => SubSubCategoryController::class,
        'product' =>    ProductController::class,
        'supplier' =>   SupplierController::class,
        'purchase' =>   PurchaseController::class,
        'shipment_info' =>  ShipmentInfoController::class,
        'attribute' =>  AttributeController::class,
        'variant' =>    VariantController::class,
        'city' =>       CityController::class,
        'sub_city' =>   SubCityController::class,
        'coupon' =>     CouponController::class,
        'admin' =>      AdminController::class,
    ]);

    //single routes
    Route::get('api/product/copy/{id}/{item}',[ProductController::class,'productCopy'])->name('product.copy');
    Route::get('api/product/image/delele/{id}',[ProductController::class,'productImageDelete']);
    Route::get('backend/reqeusted/product/list',[ProductController::class,'requestProductList'])->name('backend_requested_product');
    //order routes
    Route::get('backend/user/list',[backendOrderController::class,'users'])->name('user_list');
    Route::get('backend/customer/list',[backendOrderController::class,'customers'])->name('customer_list');
    Route::get('backend/order/list',[backendOrderController::class,'index'])->name('backend_orders');
    Route::get('backend/order/details/{id}',[backendOrderController::class,'orderDetails'])->name('backend_order_details');
    Route::get('api/order/status/change/{id}/{status}',[backendOrderController::class,'statusChange']);
 
});


Route::get('/admin/login', [HomeController::class, 'login'])->name('admin.login');
