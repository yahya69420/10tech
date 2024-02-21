<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\UserAddress;
use App\Models\OrderItems;
use App\Models\UserPayments;
use App\Models\Orders;

class OrdersController extends Controller
{
    public function completeOrder(Request $request)
    {
        // Only allow one address per user
        $userAddress = UserAddress::where('user_id', auth()->user()->id)->first();

        if ($userAddress) {
            $userAddress->update([
                'address_line_1' => $request->addressLine1,
                'address_line_2' => $request->addressLine2,
                'city' => $request->city,
                'post_code' => $request->postcode,
                'country' => $request->country,
                'user_id' => auth()->user()->id
            ]);
        } else {
            $userAddress = UserAddress::create([
                'address_line_1' => $request->addressLine1,
                'address_line_2' => $request->addressLine2,
                'city' => $request->city,
                'post_code' => $request->postcode,
                'country' => $request->country,
                'user_id' => auth()->user()->id
            ]);
        }

        // Update or create user payment information
        $userPayments = UserPayments::where('user_id', auth()->user()->id)->first();

        if ($userPayments) {
            $userPayments->update([
                'card_number' => $request->cardnumber,
                'card_holder_name' => $request->cardname,
                'expiry_date' => $request->expmonth,
                'cvv' => $request->cvv,
                'user_id' => auth()->user()->id,
            ]);
        } else {
            UserPayments::create([
                'card_number' => $request->cardnumber,
                'card_holder_name' => $request->cardname,
                'expiry_date' => $request->expmonth,
                'cvv' => $request->cvv,
                'user_id' => auth()->user()->id,
            ]);
        }
    }
}
