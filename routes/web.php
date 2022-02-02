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

Route::get('test', function (){
//    $balance = rand(0, 100);
//    if($balance>50) {
//        \App\Events\BingoEvent::dispatch($balance);
//    }


//    \Illuminate\Support\Facades\Mail::to("yulia.kiseluok@gmail.com",)
//        ->send(new \App\Mail\BingoMail(1000));
    \App\Jobs\BingoJob::dispatch()->delay(now()->addMicroseconds(100));
    dump(444);
});
//api.openweathermap.org/data/2.5/weather?q=Minsk&lang=ru&appid=2f2aa62da26c00cf1b29fa4caf4406fb
Route::get('test2', function (){
    $response = \Illuminate\Support\Facades\Http::get('api.openweathermap.org/data/2.5/weather', [
        'q' => 'Minsk',
        'lang' => 'ru',
        'appid' => '2f2aa62da26c00cf1b29fa4caf4406fb'
    ]);
    dd($response->object());
    //$response = \Illuminate\Support\Facades\Http::
//    $response = \Illuminate\Support\Facades\Http::post('https://google-translate1.p.rapidapi.com/language/translate/v2/detect', [
//        'q' => 'Привет мир!',
//        'target' => 'en',
//        'sourse' => 'ru'
//    ]);

});

Route::get('test3', function (){
    $response = \Illuminate\Support\Facades\Http::get('api.openweathermap.org/data/2.5/weather', [
        'zip' => '220004,BY',
        'lang' => 'ru',
        'appid' => '2f2aa62da26c00cf1b29fa4caf4406fb'
    ]);
    dd($response->object());

});

Route::get('test4', \App\Http\Controllers\Api\ApiController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::apiResource('products', \App\Http\Controllers\Api\ApiProductController::class);
