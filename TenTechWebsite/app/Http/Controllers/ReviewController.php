<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OrderItems; //Ordered
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_id) 
    {
        // Attempt to find a product by its id with a stock > 0 
        $product = Product::where('id', $product_id)->where('stock','>','0')->first();

        // Check if the product was found
        if ($product) 
        {
            // Retrieve the ID of the found product
            $product_id = $product->id;

            // Check if there's a verified purchase for this product by the current user
            $verified_purchase = OrderItems::whereHas('order', function ($query) use ($product_id) {
                $query->where('user_id', Auth::id()); // Filter orders by the current user's ID
            })->where('product_id', $product_id)->exists(); // Check if the product is in the user's orders
            
            return view('reviews.index',['product' => $product,
                                        'verified_purchase'=>$verified_purchase,
                                        ]);

        }else {
            // If no product matches the search criteria, redirect back with a status message
            return redirect()->back()->with('status','The link you follow was broken');
        }
    }

    public function create(Request $request) 
    {
        $product_id = $request->input('product_id');

        $product = Product::where('id', $product_id)->where('stock','>','0')->first();

        if ($product) 
        {
            $user_review= $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review
            ]);

            // Fetch the first category associated with the product
            $firstCategory = $product->categories()->first();
            

            if($firstCategory)
            { 
                $categorySlug = $firstCategory->slug;
                $prodId = $product->id;
                
                if ($new_review) { 
                    return redirect()->route('productdetail', ['id' => $product_id])->with('status', "Thank you for writing a review");
                }

            }else {
                // Handle the case where no category is associated with the product
                return redirect()->back()->with('error', 'No category found for this product.');
            }
        }
        else 
        {
            return redirect()->back()->with('status','The link you follow was broken');
        }
    }

}
