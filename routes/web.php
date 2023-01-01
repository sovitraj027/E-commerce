<?php

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendControlller;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[FrontendControlller::class,'index']);
Route::get('collections/categories',[FrontendControlller::class,'categories'])->name('categories');
Route::get('/categories/{slug}',[FrontendControlller::class,'products'])->name('category.slug');
Route::get('collections/categories/{category_slug}/{product_slug}',[FrontendControlller::class,'productView']);



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin'])->group(function () {
 Route::get('/Dashboard', [DashboardController::class, 'index']);

 //category
//    Route::controller(CategoryController::class)->group(function () {
//        Route::get('/category/', 'index')->name('category.index');
//        Route::get('/category/create', 'create')->name('category.create');
//        Route::get('/category/store', 'store')->name('category.store');
//        Route::get('/category/edit/{$category}', 'edit')->name('category.edit');
//
//
//    });
 Route::get('/category',[CategoryController::class,'index'])->name('category.index');
 Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
 Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
 Route::get('/category/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');
 Route::patch('/category/{category}',[CategoryController::class,'update'])->name('category.update');

 //livewire brands
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);

//   products
Route::get('/products',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{product}',[ProductController::class,'edit'])->name('product.edit');
Route::patch('/product/{product}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/delete/{product_id}',[ProductController::class,'delteProduct'])->name('product.delete');
Route::get('/product/image/{product_image_id}',[ProductController::class,'deleteImage'])->name('product.delete-image');
Route::post('/product/color-qty/{prod_color_id}',[ProductController::class,'productColorQty'])->name('product.color.quantity');
Route::get('/product-color/{product_color_id}/delete',[ProductController::class,'deleteColor'])->name('product.delete-color');

//colors
Route::get('/colors',[ColorController::class,'index'])->name('color.index');
Route::get('/color/create',[ColorController::class,'create'])->name('color.create');
Route::post('/color/store',[ColorController::class,'store'])->name('color.store');
Route::get('/color/edit/{color}',[ColorController::class,'edit'])->name('color.edit');
Route::patch('/color/{color}',[ColorController::class,'update'])->name('color.update');
Route::get('/color/delete/{color}',[ColorController::class,'destroy'])->name('color.delete');

//sliders
Route::resource('/sliders',SliderController::class);
Route::get('/slider/{slider}',[SliderController::class,'destroy'])->name('slider.delete');





});
