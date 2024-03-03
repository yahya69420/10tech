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

        // Create order items

        $cart = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($cart as $item) {
            OrderItems::create([
                'quantity' => $item->quantity,
                'created_at' => now(),
                'updated_at' => now(),
                'order_id' => null, // This will be updated when we have the orders table
                'product_id' => $item->product_id,
            ]);
        }

        $discount = session('discount');
        // dd($discount);
        // $totalAmount = session('totalAmount');
        $totalAmount = Cart::where('user_id', auth()->user()->id)->sum('total');
        $discountTotal = session('discountTotal');

        // Create an order
        $order = Orders::create([
            'total_before_discount' => $totalAmount,
            'discount_amount' => $discountTotal,
            'total_after_discount' => $totalAmount - $discountTotal,
            'status' => 'pending',
            'order_date' => now(),
            'tracking_number' => uniqid(),
            'user_address_id' => $userAddress->id,
            'user_payment_id' => $userPayments->id,
            'discount_id' => $discount->id ?? null,
            'user_id' => auth()->user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // odate the order_id in the order_items table
        OrderItems::where('order_id', null)->update(['order_id' => $order->id]);

        return view('complete', ['userAddress' => $userAddress]);
    }


    public function orderHistory() {
        $orders = Orders::where('user_id', auth()->user()->id)->get();
        return view('order-history', ['orders' => $orders]);
    }
}
