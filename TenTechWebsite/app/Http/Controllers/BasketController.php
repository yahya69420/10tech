<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{


    // only authenticated users can access this controller
    // copied from HomeController.php
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // use join to get the relevant information from the products table using the foreign key
        $products = DB::table('cart')
        // from the cart table 
        // join the products table where the cart FK is equal to the products PK in the products table
            ->join('products', 'cart.product_id', '=', 'products.id')
            // also only when the user id in the cart table is equal to the currently authenticated users id
            // so only they can see their own cart
            ->where('cart.user_id', '=', auth()->user()->id)
            // select all the columns from the products table, and retrieve the cart id that 
            // is attributed
            ->select('products.*', 'cart.id as cart_id')
            // and then get all the results of tge SQL qury 
            ->get();
            // and then returb  the view with the products variable
            return view('basket', ['products' => $products]);
    }

    public function addToBasket(Request $request)
    {
        // create a new cart object for this specific user
        $cart = new Cart();
        // set the carts attribute of a user id to the currently authenticated users id
        // each user will have their own cart
        $cart->user_id = auth()->user()->id;
        // set the carts attribute of a product id to the product id that was passed in the request,
        // which is what is referenced in the view in the POST form as a hidden input
        $cart->product_id = $request->product_id;
        // save the cart object to the database
        $cart->save();
        // redirect the user to the page that were on before added to cart clickjed
        return back()-> with('successfulladdition', 'Item added to basket');
    }

    public function removeFromBasket($id) 
    {
        Cart::destroy($id);
        return back()-> with('success', 'Item removed from basket');
    }

    public function checkout()
    {
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', '=', auth()->user()->id)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
            return view('checkout', ['products' => $products]);    }
}
