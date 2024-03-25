<?php

namespace App\Http\Controllers;
use App\Models\OrderItems; //Ordered
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    // Adds a new rating or updates an existing one for a product.
    public function add(Request $request)
    {
        //  Retrieve rating and product ID from the request.
        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');
        
        // Check if the product exists and is in stock.
        $product_check = Product::where('id', $product_id)->where('available', '1')->first();
        if ($product_check) 
        { 
            // Verify if the user has purchased the product before allowing them to rate it.
            $verified_purchase = OrderItems::whereHas('order', function ($query) use ($product_id) {
                $query->where('user_id', Auth::id());
            })->where('product_id', $product_id)->exists();
            
            if ($verified_purchase) 
            {
                // Check if the user has already rated this product.
                $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if ($existing_rating) // Update the existing rating. 
                {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();
                }
                else { // Or create a new rating entry.
                    Rating::create([
                    'user_id'=> Auth::id(),
                    'prod_id'=> $product_id,
                    'stars_rated' => $stars_rated 
                    ]);
                }
                // Redirect back with a success message.
                return redirect()->back()->with('status',"Thank you for Rating this product");
                
            }
            else // If the user hasn't purchased the product, deny rating.
            {
                return redirect()->back()->with('Ratings_Error',"Rating Unavaliable: You must purchase this product before rating it");
            }
        }
        else // If the product doesn't exist or isn't active, return an error.
        { 
            return redirect()->back()->with('Ratings_Error',"Error: Broken Link");
        }
    }
}
