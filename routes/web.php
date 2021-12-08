<?php

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

Route::get('/product', function () {
    $category = new Category();
    $category->name = 'TV';
    $category->save();
    return view('product');
});

Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
