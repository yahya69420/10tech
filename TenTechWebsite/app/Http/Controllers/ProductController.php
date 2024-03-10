<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Review;
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

        $reviews = Review::with('user.address')->where('prod_id', $product->id)->get();
        //$reviews = Review::with('user.address')->where('prod_id', $product->id)->get();
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
                                    'user_rating'=>$user_rating,
                                    'reviews'=>$reviews]);
    }

    public function showAllConsoles()
    {
        $consoles = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 2);
            
        $brandFilter = request()->get('brand');
        $releaseYear = request()->get('release');
        $sortOrder = request()->get('sort');

        if ($brandFilter) {
            $consoles->where('brand', $brandFilter);
        }
        
        if ($releaseYear) {
            $consoles->where('release', $releaseYear);
        }

        if ($sortOrder == 'price_asc') {
            // Sort the $mobiles collection by price in ascending order
            $consoles  = $consoles->orderBy('price',"asc");
        } elseif ($sortOrder == 'price_desc') {
            $consoles  = $consoles ->orderBy('price',"desc");
        }

        $consoles = $consoles->get();
        
        return view('Console', [
            'consoles' => $consoles,
            'currentBrand' => $brandFilter,
            'currentRelease' => $releaseYear,
            'currentSort' => $sortOrder,
        ]);
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
            ->where('category_product.category_id', 3);
            //->get();
        

        $brandFilter = request()->get('brand');
        $releaseYear = request()->get('release');
        $sortOrder = request()->get('sort');

        if ($brandFilter) {
            $monitors->where('brand', $brandFilter);
        }
        
        if ($releaseYear) {
            $monitors->where('release', $releaseYear);
        }

        if ($sortOrder == 'price_asc') {
            // Sort the $mobiles collection by price in ascending order
            $consoles  = $monitors->orderBy('price',"asc");
        } elseif ($sortOrder == 'price_desc') {
            $consoles  = $monitors ->orderBy('price',"desc");
        }

        $monitors = $monitors->get();
        
        return view('Monitor', [
            'monitors' => $monitors,
            'currentBrand' => $brandFilter,
            'currentRelease' => $releaseYear,
            'currentSort' => $sortOrder,
        ]);


        
    }

    public function showAllTablets() {
        $tablets = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 4);
            

        $brandFilter = request()->get('brand');
        $releaseYear = request()->get('release');
        $sortOrder = request()->get('sort');

        if ($brandFilter) {
            $tablets->where('brand', $brandFilter);
        }
        
        if ($releaseYear) {
            $tablets->where('release', $releaseYear);
        }

        if ($sortOrder == 'price_asc') {
            // Sort the $mobiles collection by price in ascending order
            $tablets= $tablets->orderBy('price',"asc");
        } elseif ($sortOrder == 'price_desc') {
            $tablets  = $tablets ->orderBy('price',"desc");
        }

        $tablets = $tablets->get();
        
        return view('Tablet', [
            'tablets' => $tablets,
            'currentBrand' => $brandFilter,
            'currentRelease' => $releaseYear,
            'currentSort' => $sortOrder,
        ]);
    }

    public function showAllLaptops() {
        $laptops = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 5);
            //->get();
        
        $brandFilter = request()->get('brand');
        $releaseYear = request()->get('release');
        $sortOrder = request()->get('sort');

        if ($brandFilter) {
            $laptops->where('brand', $brandFilter);
        }
        
        if ($releaseYear) {
            $laptops->where('release', $releaseYear);
        }

        if ($sortOrder == 'price_asc') {
            // Sort the $mobiles collection by price in ascending order
            $laptops  = $laptops->orderBy('price',"asc");
        } elseif ($sortOrder == 'price_desc') {
            $laptops  = $laptops ->orderBy('price',"desc");
        }

        $laptops = $laptops->get();
        
        return view('Laptop', [
            'laptops' => $laptops,
            'currentBrand' => $brandFilter,
            'currentRelease' => $releaseYear,
            'currentSort' => $sortOrder,
        ]);
    }

}
