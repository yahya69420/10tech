<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Models\Product;
class WishlistTest extends TestCase
{
    // Need wishlists seeded data for this to work 
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


        $response = $this->post(route('add-to-wishlist'), [
            'product_id' => $product_id,
            'user_id' => "1",
        ]);

        $response->assertRedirect()->assertSessionHas('success_wishlist', 'Product added to wishlist!');

        ;
    }

    
    public function test_delete_item_from_wishlist(){

        // Log in as a user
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);
        
        // Get a product to add to the wishlist
        $product = Product::findOrFail(1);
        $product_id = $product->id;
        
        // Add the product to the wishlist
        $response = $this->post(route('add-to-wishlist'), [
            'product_id' => $product_id,
            'user_id' => "1",
        ]);
    
        // Make a request to delete the wishlist item
        $response = $this->post('delete-wishlist-item', ['product_id' => $product_id]);

        // Assert that the deletion was successful
        $response->assertStatus(200)
                ->assertJson(['status' => 'Item removed Successfully']);

        // Ensure the wishlist item is deleted from the database
        $this->assertDatabaseMissing('wishlists', [
            'user_id' => '1',
            'product_id' =>$product_id,
        ]);

    }

}
