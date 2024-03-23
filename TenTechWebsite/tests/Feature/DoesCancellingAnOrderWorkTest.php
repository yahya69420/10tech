<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Orders;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class DoesCancellingAnOrderWorkTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_does_cancelling_an_order_work_test(): void
    {
        // register first
        $response = $this->post('/register', [
            'email' => 'cancellinganorder@test.com',
            'password' => 'TestTest1',
        ]);
        // redirect to the shop page
        $response = $this->get('/shop');
        $response->assertStatus(200);
        // go to the productdetails/2
        $response = $this->get('/productdetail/2');
        $response->assertStatus(200);
        $name = DB::table('products')->where('id', 2)->first()->name;
        $oldStockLevel = DB::table('products')->where('id', 2)->first()->stock;
        // dd($oldStockLevel);
        // add product to basket
        $response = $this->post('/add_to_basket', [
            'product_id' => 2,
            'quantity' => 1,
            'product_name' => $name,
        ]);
        // dd($response);
        $response->assertRedirect('/productdetail/2');
        $response->assertStatus(302);
        // dd($response);
        $response->assertStatus(302);
        $response->assertRedirect('/productdetail/2');
        // dd(session('successfulladdition'));
        $cart = Cart::where('product_id', 2)->where('user_id', auth()->user()->id)->first();
        $productName = DB::table('products')->where('id', 2)->first()->name;
        $response->assertSessionHas('successfulladdition', $cart->quantity . ' ' . $productName . '(s) added to basket');
        // clear the session data
        session()->forget('successfulladdition', 'totalItems', 'totalAmount');
        // now we go the basket page
        $response = $this->get('/basket');
        $response->assertStatus(200);
        // now we go to the checkout page
        $response = $this->get('/checkout');
        $response->assertStatus(200);
        // now we order the product
        $response = $this->post('/completeorder', [
            'address_line_1' => '1 Test Street',
            'address_line_2' => 'Testington',
            'city' => 'Testville',
            'post_code' => 'TE1 1ST',
            'country' => 'England',
            'user_id' => auth()->user()->id,
            'card_number' => '1234 1234 1234 1234',
            'card_holder_name' => 'Test Test',
            'expiry_date' => '12/23',
            'cvv' => '123',
            'user_id' => auth()->user()->id,
        ]);
        $response->assertStatus(200);
        $newStockLevel = DB::table('products')->where('id', 2)->first()->stock;
        // dd($oldStockLevel, $newStockLevel);
        // assert that the old stock - 1 happens to be equal to the new stock level
        $this->assertTrue($oldStockLevel - 1 == $newStockLevel);
        // now we cancel the order to test if the stock level goes back up, and the order status changes to 'cancelled'
        // we need the tracking number
        $userOrders = Orders::where('user_id', auth()->user()->id)->first();
        // dd($userOrders->tracking_number);
        // go to the order details page
        $response = $this->post('order-details/' . $userOrders->tracking_number);
        $response->assertStatus(200);
        // are we there?
        // we need to test if the page is displaying that one order
        $response->assertSee('Order ID: ' . $userOrders->tracking_number);
        // now we cancel the order
        $response = $this->delete(url('cancel-order', ['id' => $userOrders->id]), [
            'id' => $userOrders->id,
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => 'Order has been cancelled',
            ]);
        // dd($response);
        // now we go to the order history page
        $response = $this->get('/order-history');
        $response->assertStatus(200);
        // dd($response->content());
        // now we check if the order is cancelled
        $response->assertSee('Order ID: ' . $userOrders->tracking_number);
        $response->assertSee('CANCELLED');
        $response->assertSee('<div class="progress-bar bg-danger"', false);
        // now we check if the stock level has gone back up to the old level before the order went through
        $newStockLevel = DB::table('products')->where('id', 2)->first()->stock;
        // dd($oldStockLevel, $newStockLevel);
        $this->assertEquals($oldStockLevel, $newStockLevel);
        // delete the user as its not linger needed
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }
}
