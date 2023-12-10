<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('welcome', ['products' => $products]);
    }

    public function productDetail($productId)
    {
        $product = Product::find($productId);
        return view('productdetail', ['product' => $product]);
    }
}
