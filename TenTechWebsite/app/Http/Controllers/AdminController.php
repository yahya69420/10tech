<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'You are not logged in!');
        } else if (auth()->user()->is_admin == 0) {
            return redirect('/shop')->with('error', 'You are not an administrator of this site!');
        } else {
            return view('layouts.dashboard');
        }
    }
    //
}
