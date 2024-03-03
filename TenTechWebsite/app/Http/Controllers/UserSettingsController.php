<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\File;
use App\Models\UserAddress;
use App\Models\UserPayments;

class UserSettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } // only authenticated users can access the settings page

    public function index()
    {
        $user = Auth::user();
        $userAddress = UserAddress::where('user_id', $user->id)->first();
        $userPayments = UserPayments::where('user_id', $user->id)->first();
        $lastFourDigits = substr($userPayments->card_number, -4);
        if ($user == null) {
            return redirect('/login');
        } else {
            return view('settings', ['user' => $user, 'userAddress' => $userAddress, 'userPayments' => $userPayments, 'lastFourDigits' => $lastFourDigits]);
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
            session()->forget(['cartItems', 'totalItems', 'totalAmount', 'discount', 'discountTotal']);
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

        // delete the old pp if it is in the user public folder
        if (Auth::check()) {
            $user = Auth::user();
            $profileImagePath = public_path('/') . $user->profile_image;
            // if the file exists, delete it
            // save space
            if (File::exists($profileImagePath)) {
                // delte it 
                File::delete($profileImagePath);
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

    public function updateAddress(Request $request)
    {
        if ($request->address_line_1 == null || $request->city == null || $request->post_code == null || $request->country == null) {
            return redirect('/settings')->with('error', 'All fields are required');
        }

        $userAddress = UserAddress::where('user_id', auth()->user()->id)->first();
        $userAddress->update([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'country' => $request->country,
            'user_id' => auth()->user()->id
        ]);
        // dd($request->address_line_1, $request->address_line_2, $request->city, $request->postcode, $request->country);
        return redirect('/settings')->with('success', 'Address updated successfully');
    }

    public function deleteAddress(Request $request)
    {
        if (UserAddress::where('user_id', auth()->user()->id)->where('address_line_1', null)->where('address_line_2', null)->where('city', null)->where('post_code', null)->where('country', null)->count() > 0) {
            return redirect('/settings')->with('error', 'No address to delete');
        }

        $userAddress = UserAddress::where('user_id', auth()->user()->id)->first();
        $userAddress->update([
            'address_line_1' => null,
            'address_line_2' => null,
            'city' => null,
            'post_code' => null,
            'country' => null,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/settings')->with('success', 'Address deleted successfully');
    }


    public function addPaymentInfo(Request $request) {
        // dd($request->all());
        
        if ($request->card_number == null || $request->card_holder_name == null || $request->expiry_date == null || $request->cvv == null) {
            return redirect('/settings')->with('error', 'All fields are required');
        }

        $request->validate([
            'card_number' => 'required',
            'card_holder_name' => 'required',
            'expiry_date' => 'required',
            'cvv' => 'required',
            'cardType' => 'required',
            'cardColour' => 'required',
        ]);

        // dd($request->card_number, $request->card_holder_name, $request->expiry_date, $request->ccv);


        $userPayments = UserPayments::where('user_id', auth()->user()->id)->first();
        $userPayments->update([
            'card_number' => $request->card_number,
            'card_holder_name' => $request->card_holder_name,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,
            'card_type' => $request->cardType,
            'color' => $request->cardColour,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/settings')->with('success', 'Payment card added successfully');
    }


    public function deletePaymentDetails() {
        if (UserPayments::where('user_id', auth()->user()->id)->where('card_number', null)->where('card_holder_name', null)->where('expiry_date', null)->where('cvv', null)->count() > 0) {
            return redirect('/settings')->with('error', 'No payment card to delete');
        }

        $userPayments = UserPayments::where('user_id', auth()->user()->id)->first();
        $userPayments->update([
            'card_number' => null,
            'card_holder_name' => null,
            'expiry_date' => null,
            'cvv' => null,
            'card_type' => null,
            'color' => null,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/settings')->with('success', 'Payment card deleted successfully');
    }
}
