<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OrderItems; //Ordered
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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

            $review_check = Review::where('user_id', Auth::id())->where('prod_id',$product_id)->first();

            if ($review_check) 
            {
                return view('reviews.edit', ['review' => $review_check,
                                            ]);
            } 
            else 
            {
                $verified_purchase = OrderItems::whereHas('order', function ($query) use ($product_id) {
                $query->where('user_id', Auth::id()); // Filter orders by the current user's ID
                })->where('product_id', $product_id)->exists(); // Check if the product is in the user's orders
                
                return view('reviews.index',['product' => $product,
                                            'verified_purchase'=>$verified_purchase,
                                            ]);
            }

            // Check if there's a verified purchase for this product by the current user
            

        }else {
            // If no product matches the search criteria, redirect back with a status message
            return redirect()->back()->with('status','The link you follow was broken');
        }
    }

    public function create(Request $request) 
    {

        $validatedData = $request->validate([
            'product_id' => 'required|integer', // Ensure the product_id is provided and is an integer
            'user_review' => 'required|string|min:1', // Ensure the user_review is provided, is a string, and not empty
        ]);
        // Get the product ID from the request
        $product_id = $request->input('product_id');

        // Find the product with the given ID that has stock available
        $product = Product::where('id', $product_id)->where('stock','>','0')->first();

        if ($product) 
        {
            // Get the user review from the request
            $user_review= $validatedData['user_review']; // Use validated data

            // Create a new review for the product
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review
            ]);

            // Fetch the first category associated with the product
            $firstCategory = $product->categories()->first();
            

            if($firstCategory)
            { 
                
                if ($new_review) { 
                    // Redirect to the product detail page with a success message
                    return redirect()->route('productdetail', ['id' => $product_id])->with('status', "Thank you for writing a review");
                }

            }else {
                // Handle the case where no category is associated with the product
                return redirect()->back()->with('error', 'No category found for this product.');
            }
        }
        else 
        {
            // Handle the case where the product is not found or out of stock
            return redirect()->back()->with('status','The link you follow was broken');
        }
    }

    public function edit($product_id) 
    {
        // Attempt to find a product by its ID where stock is greater than 0
        $product = Product::where('id', $product_id)->where('stock','>','0')->first();

        // Check if the product was found
        if ($product) 
        {
            // Product found, now find a review by the current authenticated user for this product
            $product_id = $product->id;
            $review = Review::where('user_id',Auth::id())->where('prod_id',$product_id)->first();

            // Check if a review by the current user for this product exists
            if ($review)
            {
                // Review exists, return the edit review view with the review data
                return view('reviews.edit', ['review' => $review,
                                            ]);
            }
            else{
                // Review does not exist, redirect back with an error status message
                return redirect()->back()->with('status','The link you followed was broken');
            }
        }
        else 
        {
            return redirect()->back()->with('status',"The link you follow was broken");
        }



    }

    public function update(Request $request) 
    {
        //Retrieve the "user_review" input from request
        $user_review = $request->input('user_review');

        // Check if the 'user_review' is not empty.
        if ($user_review!= '')
        { 
            // Retrieve the 'review_id' from the request.
            $review_id = $request->input('review_id');
            // Find the review by its ID and the ID of the currently authenticated user.
            $review = Review::where('id', $review_id)->where('user_id',Auth::id())->first();
            
            // Check if the review exists.
            if ($review) {

                // Update the 'user_review' field with the new review text.
                $review->user_review = $request->input('user_review');
                $review->update();

                // Redirect to the product detail page with a success status message.
                return redirect()->route('productdetail', ['id' => $review->product->id])->with('status', "Thank you for writing a review");
                
            }
            else 
                {
                    // Redirect back with an error status message if the review does not exist.
                    return redirect()->back()->with('status','Link is broken');
                }
        }
        else 
        {
            // Redirect back with an error status message if the review text is empty.
            return redirect()->back()->with('status',"You cannot subit an empty review");
        }

    }

}
