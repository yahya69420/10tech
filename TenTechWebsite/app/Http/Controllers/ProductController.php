<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('welcome', ['products' => $products, 'categories' => $categories]);
    }

    public function productDetail($productId)
    {
        $product = Product::find($productId);
        return view('productdetail', ['product' => $product]);
    }

    public function showAllConsoles() 
    {
        $consoles = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 2)
            ->get();

        return view('console', ['consoles' => $consoles]);
    }

    public function showAllMobiles() 
    {
        $mobiles = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 1)
            ->get();

        return view('mobile', ['mobiles' => $mobiles]);
    }

    public function showAllMonitors() 
    {
        $monitors = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 3)
            ->get();

        return view('monitor', ['monitors' => $monitors]);
    }

    public function showAllTablets() {
        $tablets = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 4)
            ->get();

        return view('tablet', ['tablets' => $tablets]);
    } 

    public function showAllLaptops() {
        $laptops = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 5)
            ->get();

        return view('laptop', ['laptops' => $laptops]);
    }
    
}
