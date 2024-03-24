<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Orders;

class DoesGoingToAnOrderDetailsPageWorkTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_does_going_to_order_details_page_work(): void
    {
        // take advantage of the seeded data that already exists
        // login in as the user
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        $userOrders = Orders::with('orderItems')
            ->where('user_id', auth()->user()->id)
            ->first();


        $response = $this->post(route('order-details', ['id' => $userOrders->tracking_number]), [
            'id' => $userOrders->tracking_number,
        ]);
        // Assert that the response is successful (status code 200)
        $response->assertStatus(200);

        // we need to test if the page is displaying that one order
        $response->assertSee('Order ID: ' . $userOrders->tracking_number);
        $response->assertSee('PENDING');
        $response->assertSee('<div class="progress-bar bg-warning"', false);
        $details = Orders::with('orderItems', 'userAddress', 'userPayments', 'orderItems.product', 'user')
            ->where('tracking_number', $userOrders->tracking_number)
            ->first();
        $item = $details->orderItems->first();
        $response->assertSee('<img src="' . asset($item->product->image) . '" alt="product" class="img-fluid" style="height:150px; width:150px;">', false);
        $response->assertSee('Unit Price: £' .  $item->product->price);
        if ($item->quantity > 1) {
            $response->assertSee('Quantity: ' .  $item->quantity . ' units');
        } else {
            $response->assertSee('Quantity: ' .  $item->quantity . ' unit');
        }
        $response->assertSee('Total Price: £' .  number_format($item->product->price, 2));

        $response->assertSee('Order ID: ' . $userOrders->tracking_number);
        $response->assertSee('Order Date: ' . \Carbon\Carbon::parse($details->order_date)->toDayDateTimeString());

        $response->assertSee('Personal Details');

        $response->assertSee('Email: ' . $details->user->email);

        $response->assertSee('Delivery Details');

        $response->assertSee('Address Line 1: ' . $userOrders->address_line_1);
        $response->assertSee('Address Line 2: ' . $userOrders->address_line_2);
        $response->assertSee('City: ' . $userOrders->city);
        $response->assertSee('Post Code: ' . $userOrders->postcode);
        $response->assertSee('Country: ' . $userOrders->country);

        $response->assertSee('Total Price (+): £' . number_format($details->total_before_discount, 2));
        $response->assertSee('<h4 style="font-weight: bold; font-size: 30px; color:green;"', false);
        $response->assertSee('Discounts (-): £' . number_format($details->discount_amount, 2));

        $response->assertSee('<h4 style="font-weight: bold; font-size: 30px;"', false);
        $response->assertSee('Grand Total: £' . number_format($details->total_after_discount, 2));
    }
}
