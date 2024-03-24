<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Orders;

class DoesGoingToOrderHistoryPageWorkTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_does_going_to_order_history_page_work(): void
    {
        // take advantage of the seeded data that already exists
        // login in as the user
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        // go to the order history page
        $response = $this->get('/order-history');
        // check if the status is 200
        $response->assertStatus(200);

        $userOrders = Orders::with('orderItems')
            ->where('user_id', auth()->user()->id)
            ->get();
        // does the title show?
        $userOrderCount = $userOrders->count();
        if ($userOrderCount == 0) {
            $response->assertSee('<p class="heading-4 font-weight-bold title fs-1">You have no orders yet', false);
            $response->assertSee('<a href="' . url('/') . '" class="btn btn-primary btn-lg mb-2">Let\'s change that!</a>', false);
        } elseif ($userOrderCount == 1) {
            $response->assertSee('<p class="heading-4 font-weight-bold title fs-1">Order History (' . $userOrderCount . ' order)', false);
        } else {
            $response->assertSee('<p class="heading-4 font-weight-bold title fs-1">Order History (' . $userOrderCount . ' orders)', false);
        }
        // we need to test if the page is displaying the orders
        // go through ech of the orders and check if the order ID, total quantity, order date and total amount are threr on the page
        foreach ($userOrders as $order) {

            // we need to cehck if total quantity and order dahe are present
            $totalQuantity = $order->orderItems->sum('quantity');
            $orderDate = \Carbon\Carbon::parse($order->order_date)->toDayDateTimeString();

            if ($order->orderItems->count() > 1) {
                $response->assertSee('Quantity: ' . $totalQuantity . ' items ordered');
            } else {
                $response->assertSee('Quantity: ' . $totalQuantity . ' item ordered');
            }
            $response->assertSee('Order Date: ' . $orderDate);
            // is the order IDshowin ?
            $response->assertSee('Order ID: ' . $order->tracking_number);

            // is the order amount sahw=ing up?
            $response->assertSee('Total: £' . number_format($order->total_after_discount, 2));
            if ($order->status == 'pending') {
                $response->assertSee('PENDING');
                $response->assertSee('<div class="progress-bar bg-warning"', false);
            } elseif ($order->status == 'processing') {
                $response->assertSee('PROCESSING');
                $response->assertSee('<div class="progress-bar bg-info"', false);
            } elseif ($order->status == 'completed') {
                $response->assertSee('DELIVERED');
                $response->assertSee('<div class="progress-bar bg-success"', false);
            } else {
                $response->assertSee('CANCELLED');
                $response->assertSee('<div class="progress-bar bg-danger"', false);
            }
        }
    }

    // can i go to the order details page with the tracking number as my slug???
    public function test_can_i_go_to_order_details_page_using_the_tracking_number_as_the_slug_from_the_order_history_page(): void
    {
        // take advantage of the seeded data that already exists
        // login in as the user
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        // go to the order history page
        $response = $this->get('/order-history');
        // check if the status is 200
        $response->assertStatus(200);

        $userOrders = Orders::with('orderItems')
            ->where('user_id', auth()->user()->id)
            ->get();
        // we need to test if the page is displaying the orders
        // go through ech of the orders and check if the order ID, total quantity, order date and total amount are threr on the page
        foreach ($userOrders as $order) {
            $response = $this->post(route('order-details', ['id' => $order->tracking_number]), [
                'id' => $order->tracking_number,
            ]);
            // Assert that the response is successful (status code 200)
            $response->assertStatus(200);
            // go back to the order history page
            $response = $this->get('/order-history');
            // check if the status is 200
            $response->assertStatus(200);
        }
    }
}
