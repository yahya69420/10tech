<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function addUser(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    // Create a new user
    $user = new User();
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']); // Encrypt the password
    $user->save();

    // Redirect back or wherever appropriate
    return redirect()->back()->with('success', 'User added successfully!');
}   
    
    //
}
