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
        if (Cart::where('user_id', auth()->user()->id)->count() == 0) {
            return redirect('/basket')->with('error', 'Cannot check out if you have no items in your cart');
        }

        // Only allow one address per user
        $userAddress = UserAddress::where('user_id', auth()->user()->id)->first();

        if ($userAddress && $request->sameadr == "on") {
            // we are using the same address if the same address is checked
            $userAddress->update([
                'address_line_1' => $userAddress->address_line_1,
                'address_line_2' => $userAddress->address_line_2,
                'city' => $userAddress->city,
                'post_code' => $userAddress->post_code,
                'country' => $userAddress->country,
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

        // Create an order, is the same address is checked, use the user's address, otherwise use the address from the form
        if ($request->sameadr == "on") {
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
                'address_line_1' => $userAddress->address_line_1,
                'address_line_2' => $userAddress->address_line_2,
                'city' => $userAddress->city,
                'post_code' => $userAddress->post_code,
                'country' => $userAddress->country,
            ]);
        } else {
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
                'address_line_1' => $request->addressLine1,
                'address_line_2' => $request->addressLine2,
                'city' => $request->city,
                'post_code' => $request->postcode,
                'country' => $request->country,
            ]);
        }
        // odate the order_id in the order_items table
        OrderItems::where('order_id', null)->update(['order_id' => $order->id]);

        // Clear the cart
        Cart::where('user_id', auth()->user()->id)->delete();
        // clear the session
        session()->forget(['cartItems', 'totalItems', 'totalAmount', 'discount', 'discountTotal']);
        return view('complete', ['userAddress' => $userAddress]);
    }


    public function orderHistory()
    {
        $userOrders = Orders::with('orderItems')
            ->where('user_id', auth()->user()->id)
            ->get();
        // dd($userOrders);
        return view('order-history', compact('userOrders'));
        // dd($orders);
    }

    public function orderDetails(Request $request)
    {
        // need to fetch all of the details regarding the order, including the Orders itself, the OrderItems, the UserAddress, and the UserPayments, and the Product in each OrderItem as well as the User that makes the oreder
        $details = Orders::with('orderItems', 'userAddress', 'userPayments', 'orderItems.product', 'user')
            ->where('tracking_number', $request->id)
            ->first();
        // dd($details); // central debug view

        // $details = Orders::with('orderItems', 'userAddress', 'userPayments')
        // ->where('tracking_number', request('id'))
        // ->first();

        return view('order-details', compact('details'));
    }
}
