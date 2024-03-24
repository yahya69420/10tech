<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cart;

class UpdateCartTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_update_product_in_basket(): void
    {
        // register a user
        $response = $this->post('/register', [
            'email' => 'updatecart@test.com',
            'password' => 'TestTest1',
        ]);

        // redirect to the shop page
        $response = $this->get('/shop');
        $response->assertStatus(200);

        // go to the productdetails/2
        $response = $this->get('/productdetail/21');
        $response->assertStatus(200);
        $name = 'PrayStation 5';
        // add product to basket
        $response = $this->post('/add_to_basket', [
            'product_id' => 21,
            'quantity' => 1,
            'product_name' => $name,
        ]);

        // redirect to the basket page
        $response = $this->get('/basket');
        $response->assertStatus(200);
        // fetch the old cart
        $cart = Cart::where('product_id', 21)->where('user_id', auth()->user()->id)->first();
        // Update the product quantity in the basket
        $response = $this->post('/update_cart/' . $cart->id, [
            'cart_id' => $cart->id,
            'product_id' => 21,
            'product_name' => 'PrayStation 5',
            'product_price' => 100, // Product price
            'product_stock' => 10, // Product stock
            'product_image' => 'product_image_url', // Product image URL
            'promo_code' => null,
            'product_quantity' => 2, // Updated product quantity
        ]);

        // Assertions
        $response->assertStatus(302); // Check if redirected after form submission
        $response->assertRedirect('/basket'); // Check if redirected to the basket page
        $response->assertSessionHas('success', 'Cart updated'); // Check if success message is in session


        // Additional assertions to ensure cart data is updated correctly in the database
        $updatedCart = Cart::find($cart->id);
        $this->assertEquals(2, $updatedCart->quantity); // Check if quantity is updated correctly
        // clear the basket once the test is done
        // Remove a product from the basket, the cart id is 5
        $response = $this->get('/remove_from_basket/5');
        $response->assertStatus(302);

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
