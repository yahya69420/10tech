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

        return view('Console', ['consoles' => $consoles]);
    }

    public function showAllMobiles()
    {
        $mobiles = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 1);
            //->get();

        $brandFilter = request()->get('brand');
        $releaseYear = request()->get('release');
        $sortOrder = request()->get('sort');

        //Filter by brand if a brand filter is applied 
        
            if ($brandFilter) {
            $mobiles->where('brand', $brandFilter);
        }
        
        if ($releaseYear) {
            $mobiles->where('release', $releaseYear);
        }

        //Apply sorting  
        
        if ($sortOrder == 'price_asc') {
        // Sort the $mobiles collection by price in ascending order
            $mobiles = $mobiles->orderBy('price',"asc");
        } elseif ($sortOrder == 'price_desc') {
            $mobiles = $mobiles->orderBy('price',"desc");
        }

        $mobiles = $mobiles->get();

        $uniqueBrands = Product::distinct()->pluck('brand')->sort();
        $uniqueReleases = Product::distinct()->pluck('release')->sort();
        return view('Mobile', [
            'mobiles' => $mobiles,
            'currentBrand' => $brandFilter,
            'currentRelease' => $releaseYear,
            'currentSort' => $sortOrder
        ]);
    }

    public function showAllMonitors()
    {
        $monitors = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 3)
            ->get();

        return view('Monitor', ['monitors' => $monitors]);
    }

    public function showAllTablets() {
        $tablets = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 4)
            ->get();

        return view('Tablet', ['tablets' => $tablets]);
    }

    public function showAllLaptops() {
        $laptops = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 5)
            ->get();

        return view('Laptop', ['laptops' => $laptops]);
    }

}
