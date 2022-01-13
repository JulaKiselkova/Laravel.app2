<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\SiteController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;

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

Route::get('/', function () {
    $list = Product::query()
        ->where('price', '>', 4000)
        ->get();

//    $product = new Product();
//    $product->name = 'Phone';
//    $product->price = 4444;
//    $product->save();
    //dd($product);

    return view('main');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('show-form', [FormController::class, 'showForm'])
    ->name('showForm');
Route::post('show-form', [FormController::class, 'postForm'])
    ->name('namePostForm');

Route::get('product/{id}',[ProductController::class, 'index'])->name('showProduct');
Route::get('catalog',[ProductController::class, 'catalog'])->name('catalog');

Route::get('admin', function (){
    return view('admin.index');
});

Route::get('test-file', function (){
    $brand = \App\Models\Brand::find(53);
    $product = Product::first();
    dd($product->brand);
});

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index']);
Route::post('add-To-Cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');

Route::middleware(CheckAuth::class)->prefix('admin')->name('admin.')->group(function (){
    Route::get('/', function () { echo 'test';});
    Route::resources([
        'brand'=> \App\Http\Controllers\Admin\BrandController::class,
        'category'=> \App\Http\Controllers\Admin\CategoryController::class,
        'product'=> \App\Http\Controllers\Admin\ProductController::class
    ]);
});

Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
