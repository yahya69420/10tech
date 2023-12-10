<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

        // get all products from the database
        $products = Product::all();
        // return the basket view with the products collection of all products available in the database
        return view('basket', [
            'products' => $products
        ]);
    }
}
