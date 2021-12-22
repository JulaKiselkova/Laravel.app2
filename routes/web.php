<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\SiteController;
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
    //$product = Product::find(1);
    $list = Product::query()
        //->where('status', true)
        ->where('price', '>', 4000)
        ->get();
    //dd($list);

    $product = new Product();
    $product->name = 'Phone';
    $product->price = 4444;
    $product->save();
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

//Route::resources([
//    'brand'=> \App\Http\Controllers\Admin\BrandController::class,
//    'category'=> \App\Http\Controllers\Admin\CategoryController::class,
//    'product'=> \App\Http\Controllers\Admin\ProductController::class
//]);

Route::prefix('admin')->name('admin.')->group(function (){
    Route::resources([
        'brand'=> \App\Http\Controllers\Admin\BrandController::class,
        'category'=> \App\Http\Controllers\Admin\CategoryController::class,
        'product'=> \App\Http\Controllers\Admin\ProductController::class
    ]);
});

//Route::resource('brand', \App\Http\Controllers\Admin\BrandController::class)->except(['destroy']);
//Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
//Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);


Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
