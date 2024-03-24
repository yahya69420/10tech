<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class ApplyDiscountTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_to_apply_discount(): void
    {
        // register a user
        $response = $this->post('/register', [
            'email' => 'applydiscount@email.com',
            'password' => 'TestTest1',
        ]);

        // redirect to a product 21  page
        $response = $this->get('/productdetail/21');
        $response->assertStatus(200);
        // add product to basket
        $response = $this->post('/add_to_basket', [
            'product_id' => 21,
            'quantity' => 1,
            'product_name' => 'PrayStation 5',
        ]);

        // redirect to the basket page
        $response = $this->get('/basket');
        $response->assertStatus(200);
        // apply discount
        $response = $this->post('/apply_discount', [
            'promo_code' => '20OFF',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/basket');
        // return back()->with('success', 'The discount code has been applied', ['cartItems' => $cartItems, 'totalItems' => $totalItems, 'totalAmount' => $totalAmount, 'discount' => $discount, 'discountTotal' => $discountTotal]);
        $response->assertSessionHas('success', 'The discount code has been applied');
        // clear the session data
        session()->forget('success');

        // clear the basket once the test is done
        // Remove a product from the basket, the cart id is 1
        $response = $this->get('/remove_from_basket/2');
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
