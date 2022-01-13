<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request) {
        $cart = \Session::get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::query()
        ->whereIn('id', $productIds)
            -> get();
        //dump(1);
        dump($products);
    }

    public function addToCart(Request $request) {
        $productId = $request->get('product_id');
        session()->increment('cart.'.$productId);
        //dump($productId);
        return back();
    }
}
