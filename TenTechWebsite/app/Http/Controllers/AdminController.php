<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

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

    public function admincust(){
        $data = User::where('is_admin', 0)->get();
        return view('layouts.admincust', ['data' => $data]);
    }

    /**
     * Add a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addUser(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], // Adjust password rules as needed
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user
        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'User added successfully!');
    }
    //
}
