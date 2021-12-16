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
        $categories = Category::all();
        $brands = Brand::where('status',1)->paginate(9);
        $products = Product::where('status',1)->simplePaginate(9);
        return view('product.store', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
