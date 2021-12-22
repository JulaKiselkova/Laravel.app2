<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, $id) {
        $product = Product::findOrFail($id);
        $products = Product::all();
        return view('product.product', [
            'product' => $product,
            'products' => $products
        ]);
    }

    public function catalog() {
        $offset = 0;
        $categories = Category::limit(9)->get();
        $brands = Brand::where('status',1)->limit(9)->get();
        $products = Product::where('status',1)->simplePaginate(9);
        return view('product.store', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
