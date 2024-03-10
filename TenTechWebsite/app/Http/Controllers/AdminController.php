<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\CustomerMessage;
use Illuminate\Support\Facades\Redirect;

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
        $datamess = CustomerMessage::all();
        return view('layouts.admincust', ['data' => $data], ['datamess' => $datamess]);
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
    
    public function removeUser($id)
{
    // Find the user by id
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Redirect back with success message
    return Redirect::back()->with('success', 'User removed successfully!');
}

public function editUser(Request $request, $id)
{
    // Find the user by id
    $user = User::findOrFail($id);

    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'edit_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update the user's email
    $user->email = $request->input('edit_email');
    $user->save();

    // Redirect back with success message
    return Redirect::back()->with('success', 'User email updated successfully!');
}
}