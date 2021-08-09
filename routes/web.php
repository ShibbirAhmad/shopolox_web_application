<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//frontedn classes
use App\Http\Controllers\Frontend\IndexController ;
use App\Http\Controllers\Frontend\CartController ;
use App\Http\Controllers\Frontend\OrderController ;

// admin classes
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
//order routes
Route::resources([
    'order' => OrderController::class ,
]);
//cart routes
Route::get('cart/view', [CartController::class, 'viewCart'])->name('cart_view');
Route::post('api/add/cart/{id}', [CartController::class, 'addCart'])->name('cart_add');
Route::post('api/cart/item/update', [CartController::class, 'cartUpdate'])->name('cart_update');
Route::get('api/cart/remove/{rowId}', [CartController::class, 'cartDestroy'])->name('cart_remove');
Route::get('api/cart/content', [CartController::class, 'cartContent'])->name('cart_content');








Auth::routes();

//start admin route
Route::group([
    'prefix' => 'admin',
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
    ]);

    //single routes
    Route::get('api/product/copy/{id}/{item}',[ProductController::class,'productCopy'])->name('product.copy');
    Route::get('api/product/image/delele/{id}',[ProductController::class,'productImageDelete']);

 
});


Route::get('/admin/login', [HomeController::class, 'login'])->name('admin.login');
