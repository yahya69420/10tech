<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\File;

class UserSettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } // only authenticated users can access the settings page

    public function index()
    {
        $user = Auth::user();
        $userEmail = $user->email;
        if ($user == null) {
            return redirect('/login');
        } else {
            return view('settings', ['user' => $user]);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old-password' => 'required',
            'new-password' => 'required',
            'confirm-new-password' => 'required'
        ]);


        $oldPassword = $request->input('old-password');
        $newPassword = $request->input('new-password');
        $confirmNewPassword = $request->input('confirm-new-password');

        $user = Auth::user();

        if (!Hash::check($oldPassword, $user->password)) {
            return redirect('/settings')->with('error', 'Old password does not match');
        }

        if ($newPassword !== $confirmNewPassword) {
            return redirect('/settings')->with('error', 'New passwords do not match');
        }

        if (!(strlen($newPassword) >= 8 && strlen($confirmNewPassword) >= 8 &&
            preg_match('/[a-z]/', $newPassword) &&
            preg_match('/[A-Z]/', $newPassword) &&
            preg_match('/\d/', $newPassword))) {
            return redirect('/settings')->with('error', 'Passwords need to be at least 8 characters long and have at least one uppercase letter, one lowercase letter, and one number');
        }


        // If  conditions  met, update the password
        User::where('id', $user->id)->update(['password' => Hash::make($newPassword), 'updated_at' => now()]);

        return redirect('/settings')->with('success', 'Password updated successfully');
    }

    public function deleteAccount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // find the path of the user's image file
            $profileImagePath = public_path('/') . $user->profile_image;
            // if the file exists, delete it
            if (File::exists($profileImagePath)) {
                // delte it 
                File::delete($profileImagePath);
            }
            // cascade delete 
            Cart::where('user_id', $user->id)->delete();
            User::where('id', $user->id)->delete();
            return redirect('/shop')->with('success', 'Account deleted successfully');
        } else {
            return redirect('/settings')->with('error', 'Account not deleted');
        }
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'new_profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->new_profile_image == null) {
            return redirect('/settings')->with('error', 'No file selected');
        }

        $user = Auth::user();
        // name  of the file is the time concatneateed with the extension, so it can be opened
        $name = time() . '.' . $request->new_profile_image->extension();
        // move the file to the public folder
        $request->new_profile_image->move(public_path('/'), $name);
        // update the user's profile image
        User::where('id', $user->id)->update(['profile_image' => $name, 'updated_at' => now()]);
        return redirect('/settings')->with('success', 'Profile picture updated successfully');
    }
}
