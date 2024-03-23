<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cart;

class RemoveFromBasketTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_remove_product_from_basket(): void
    {
        // Login first
        $this->post('/login', [
            'email' => 'addtobaskettest@test.com',
            'password' => 'TestTest1',
        ]);

        // // go to the productdetails/21
        // $response = $this->get('/productdetail/21');
        // $response->assertStatus(200);
        // $name = 'PrayStation 5';
        // // add product to basket
        // $response = $this->post('/add_to_basket', [
        //     'product_id' => 21,
        //     'quantity' => 1,
        //     'product_name' => $name,
        // ]);

        // Access the basket page
        $response = $this->get('/basket');

        // Get the initial quantity of items in the cart
        $initialCartQuantity = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', 21)
            ->sum('quantity');

            $this->assertEquals($initialCartQuantity, 1);

        // dd($initialCartQuantity);

        // Remove a product from the basket, the cart id is 1
        $response = $this->get('/remove_from_basket/1');
        // assert that the session has the success message
        $response->assertSessionHas('success', 'Item removed from basket');
        // Check if the quantity of items in the cart has decreased by 1
        $finalCartQuantity = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', 21)
            ->sum('quantity');

        // dd($initialCartQuantity, $finalCartQuantity);


        // Debugging output
        // dump("Initial Quantity: $initialCartQuantity");
        // dump("Final Quantity: $finalCartQuantity");

        // $this->assertEquals($initialCartQuantity - 1, $finalCartQuantity);
        $this->assertEquals($finalCartQuantity, 0);

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
