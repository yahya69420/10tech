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
        // $products = DB::table('cart')
        // from the cart table 
        // join the products table where the cart FK is equal to the products PK in the products table
        // ->join('products', 'cart.product_id', '=', 'products.id')
        // also only when the user id in the cart table is equal to the currently authenticated users id
        // so only they can see their own cart
        // ->where('cart.user_id', '=', auth()->user()->id)
        // select all the columns from the products table, and retrieve the cart id that 
        // is attributed
        // ->select('products.*', 'cart.id as cart_id')
        // and then get all the results of tge SQL qury 
        // ->get();
        // and then returb  the view with the products variable
        // return view('basket', ['products' => $products]);
        $cartItems = Cart::join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', '=', auth()->user()->id)
            ->select('products.*', 'cart.quantity as cart_quantity', 'cart.total as cart_total', 'cart.id as cart_id')
            ->get();
        // dd($cartItems);
        return view('basket', ['cartItems' => $cartItems]);
    }

    public function addToBasket(Request $request)
    {
        $product = Product::find($request->product_id);
        $cartExists = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->exists();
        if ($cartExists) {
            $cart = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->first();
            if ($cart->quantity + $request->quantity > $product->stock || $request->quantity > $product->stock) {
                return back()->with('error', 'The requested quantity exceeds the available stock');
            } else {
                $cart->quantity += $request->quantity;
                $product_price = Product::find($request->product_id)->price;
                $cart->total = $product_price * $cart->quantity;
                $cart->save();
                $product_name = $request->product_name;
                return back()->with('successfulladdition', $cart->quantity . ' ' . $product_name . '(s) added to basket');
            }
        } else {
            // create a new cart object for this specific user
            $cart = new Cart();
            // set the carts attribute of a user id to the currently authenticated users id
            // each user will have their own cart
            $cart->user_id = auth()->user()->id;
            // set the carts attribute of a product id to the product id that was passed in the request,
            // which is what is referenced in the view in the POST form as a hidden input
            $cart->product_id = $request->product_id;
            // save the cart object to the database
            $cart->quantity = $request->quantity;
            $product_price = Product::find($request->product_id)->price;
            $cart->total = $product_price * $cart->quantity;
            $cart->save();
            $product_name = $request->product_name;
            // redirect the user to the page that were on before added to cart clickjed
            return back()->with('successfulladdition', $cart->quantity . ' ' . $product_name . '(s) added to basket');
        }
    }

    public function removeFromBasket($id)
    {
        Cart::destroy($id);
        return back()->with('success', 'Item removed from basket');
    }

    public function updateCart(Request $request)
    {
        $cart = Cart::where('id', $request->cart_id)->first();
        $cart->quantity = $request->product_quantity;
        $product_price = Product::find($request->product_id)->price;
        $cart->total = $product_price * $cart->quantity;
        $cart->save();
        // dd($cart);
        return back()->with('success', 'Cart updated');
    }

    public function applyDiscount(Request $request)
    {
        $discount = DB::table('discounts')->where('code', $request->promo_code)->first();
        if ($discount) {
            if ($discount->active == 1) {
                if ($discount->start_date <= now() && $discount->end_date >= now()) {
                    $cartItems = Cart::join('products', 'cart.product_id', '=', 'products.id')
                        ->where('cart.user_id', '=', auth()->user()->id)
                        ->select('products.*', 'cart.quantity as cart_quantity', 'cart.total as cart_total', 'cart.id as cart_id')
                        ->get();
                    $totalItems = 0;
                    $totalAmount = 0;
                    foreach ($cartItems as $cartItem) {
                        $totalItems += $cartItem->cart_quantity;
                        $totalAmount += $cartItem->price * $cartItem->cart_quantity;
                    }
                    if ($discount->type == 'fixed') {
                        $discountTotal = $discount->value;
                        $totalAmount -= $discount->value;
                    } else {
                        $discountTotal = ($totalAmount * $discount->value) / 100;
                        $totalAmount -= ($totalAmount * $discount->value) / 100;
                    }
                    return back()->with('success', 'The discount code has been applied', ['cartItems' => $cartItems, 'totalItems' => $totalItems, 'totalAmount' => $totalAmount, 'discount' => $discount, 'discountTotal' => $discountTotal]);
                } else {
                    return back()->with('error', 'The discount code is not valid');
                }
            } else {
                return back()->with('error', 'The discount code is not active');
            }
        } else {
            return back()->with('error', 'The discount code is not valid');
        }
    }

    public function removeDiscount()
    {
        session()->forget(['discount', 'discountTotal']);
        return back()->with('success', 'The discount code has been removed');
    }

    public function checkout()
    {
        $cartItems = Cart::join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', '=', auth()->user()->id)
            ->select('products.*', 'cart.quantity as cart_quantity', 'cart.total as cart_total', 'cart.id as cart_id')
            ->get();
        // dd($cartItems);
        return view('checkout', ['cartItems' => $cartItems]);
    }
}
