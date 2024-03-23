<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class AddToBasketTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_adding_product_to_basket(): void
    {

        // register first
        $response = $this->post('/register', [
            'email' => 'addtobaskettest@test.com',
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

        // dd($response);

        $response->assertStatus(302);
        $response->assertRedirect('/productdetail/21');
        // dd(session('successfulladdition'));
        $cart = Cart::where('product_id', 21)->where('user_id', auth()->user()->id)->first();
        $productName = DB::table('products')->where('id', 21)->first()->name;
        $response->assertSessionHas('successfulladdition', $cart->quantity . ' ' . $productName . '(s) added to basket');
        // clear the session data
        session()->forget('successfulladdition');

    }
}
