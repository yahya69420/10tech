<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItems;
use App\Models\Review;

class WishlistTest extends TestCase
{
    
    public function tst_index_function(): void
    {
        //This simulates a user logging
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);
        //This simulates a user navigating to the wishlist page after logging in
        $response = $this->get('wishlist');

        // This checks that the user is successfully redirected 
        $response->assertStatus(200);

        // This ensures that the user sees the correct webpage layout and content
        $response->assertViewIs('Wishlist.wishlist');

        // // Assert that the 'wishlist' variable is passed to the view.
        // This checks that the necessary data (user's wishlist items) is being sent to the view for display.
        $response->assertViewHas('wishlist');

        // checks if the wishlist variable is not empty 
        $response->assertViewHas('wishlist', function ($wishlist) {
            return !$wishlist->isEmpty();
        });

    }

    public function test_add_item_to_wishlist() {
        
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        // Fetch the product with ID 1 from the database to use in the test.
        // Product(1) is out of stock product
        $product = Product::findOrFail(1);
        $product_id = $product->id;


        $response = $this->post('add-to-wishlist', [
            'product_id' => $product_id,
            'user_id' => '1',
        ]);

        $response->assertRedirect()->assertSessionHas('success_wishlist', 'Product added to wishlist!');
        
        $response = $this->post(route('add-to-wishlist'), [
            'product_id' => $product_id,
            'user_id' => '1',
        ]);
    
        // Assert the redirection back with an error message, indicating the product is already in the wishlist
        $response->assertRedirect()->assertSessionHas('wishlist_error', 'Product is already in wishlist!');
    }

}
