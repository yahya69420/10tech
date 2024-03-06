<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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
        
        // Retrieve all ratings for the specified product by its ID
        $ratings= Rating::where('prod_id', $product->id)->get();

        // Calculate the sum of all star ratings for the specified product.
        $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');

        // Attempt to retrieve the current user's rating for the specified product, if it exists.
        $user_rating = Rating::where('prod_id', $product->id)->where('user_id',Auth::id())->first();

        // Check if there are any ratings for the product.
        if($ratings->count()>0) 
        {
            // If there are, calculate the average rating by dividing the sum of ratings by the number of ratings.
            $rating_value = $rating_sum/$ratings->count();
        }else {
            // If there are no ratings, set the average rating value to 0.
            $rating_value = 0;
        }

        // Return the 'productdetail' view, passing the product details, all ratings for the product,
        // the calculated average rating value, and the current user's rating for the product, if available.
        return view('productdetail', ['product' => $product, 
                                    'ratings' => $ratings,
                                    'rating_value' =>$rating_value,
                                    'user_rating'=>$user_rating]);
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
