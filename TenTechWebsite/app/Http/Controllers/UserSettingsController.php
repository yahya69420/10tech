<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        $userEmail = $user->email;
        if ($user == null) {
            return redirect('/login');
        }
        else {
            return view('settings', ['user' => $user]);
        }
    }
    //
}
