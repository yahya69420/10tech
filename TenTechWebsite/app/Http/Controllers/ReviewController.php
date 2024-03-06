<?php

namespace App\Http\Controllers;
use App\Models\OrderItems; //Ordered
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_slug) 
    {
        // Attempt to find a product by its id with a stock > 0 
        $product = Product::where('id', $product_slug)->where('stock','>','0')->first();

        // Check if the product was found
        if ($product) 
        {
            // Retrieve the ID of the found product
            $product_id = $product->id;

            // Check if there's a verified purchase for this product by the current user
            $verified_purchase = OrderItems::whereHas('order', function ($query) use ($product_id) {
                $query->where('user_id', Auth::id()); // Filter orders by the current user's ID
            })->where('product_id', $product_id)->exists(); // Check if the product is in the user's orders
            
            return view('reviews.index', compact('product ','verified_purchase'));

        }else {
            // If no product matches the search criteria, redirect back with a status message
            return redirect()->back()->with('status','The link you follow was broken');
        }
    }
}
