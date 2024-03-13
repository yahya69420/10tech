<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Log;


class WishlistController extends Controller
{
    //Display the user's wishlist.
    public function index() 
    {
        // Retrieve all wishlist items for the currently authenticated user
        $wishlist = Wishlist::where('user_id',Auth::id())->get();

        //Return the wishlist view, passing the wishlist items
        return view('Wishlist.wishlist',['wishlist' => $wishlist]);
        
    
    }

     /**
     * Add a product to the user's wishlist.
     */

    public function add(Request $request) 
    {
        // Check if user is authenticated
        if (Auth::check())
        { 
            // Retrieve product ID from the request
            $prod_id = $request->input('product_id');

            // Find the product by ID
            $product = Product::where('id', $prod_id)
                  ->first();
            
            if($product) 
            {
                // Check if the product is already in the user's wishlist
                $isInWishlist = Wishlist::where('product_id', $prod_id)
                                    ->where('user_id', Auth::id())
                                    ->exists();
                
                if($isInWishlist) {
                    // If already in wishlist, prevent adding and show a message
                    return redirect()->back()->with('status', 'Product is already in wishlist!');
                } else {
                    // If not in wishlist, create a new wishlist entry

                    $wish = new Wishlist();
                    $wish->product_id = $product->id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    // Redirect back with a success message
                    return redirect()->back()->with('success_wishlist', 'Product added to wishlist!');
                }

            }
            else {
                // If the product doesn't exist, show an error message
                return redirect()->back()->with('status', 'Product does not exist!');
            }
        }
        else {
            // If user is not authenticated, show a login prompt
            return redirect()->back()->with('status', 'Please log in to add items to your wishlist!');
        }
    }
    /**
     * Remove a product from the user's wishlist.
    */


    public function deleteitem(Request $request) {


        // Check if user is authenticated
        if(Auth::check()) 
        {

            // Retrieve product ID from the request
            $product_id = $request->input('product_id');
            Log::info('Deleting item with product_id: ' . $product_id . ' for user_id: ' . Auth::id());

            // Check if the wishlist item exists
            if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) 
            {
                // Find the wishlist item and delete it
                $wish = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                // Return a success message
                return response()->json(['status'=>'Item removed Successfully']);
            }else {
                // If the item doesn't exist or is already removed, show an error message
                return response()->json(['status'=>'Item not found or already removed']);
            }
            
        }else 
        {
            // If user is not authenticated, show a login prompt
            return response()->json(['status'=>'Login in to continue']);
        }

    }
    

}
