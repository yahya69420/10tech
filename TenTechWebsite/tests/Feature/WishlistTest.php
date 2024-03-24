<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
class WishlistTest extends TestCase
{

    public function test_does_wishlist_render_when_empty(): void
    {
        //This simulates a user logging
        $this->post('/register', [
            'email' => 'WishlistRenderWhenEmpty@test.com',
            'password' => 'TestTest1',
        ]);
        //This simulates a user navigating to the wishlist page after logging in
        $response = $this->get('wishlist');

        // This checks that the user is successfully redirected 
        $response->assertStatus(200);

        // This ensures that the user sees the correct webpage layout and content
        $response->assertViewIs('Wishlist.wishlist');

        // Asserts that the message 'Your wishlist is empty.' is present in the response
        $response->assertSee('Your wishlist is empty.');

        // Asserts that the response contains a specific HTML element with the class 'alert-info'
        $response->assertSee('<div class="alert alert-info"', false);
        
        
        // delete the user as its not linger needed
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }
    
    public function test_add_item_to_wishlist() {
        // Register a new user
        $this->post('/register', [
            'email' => 'AddItemToWishlist@test.com',
            'password' => 'TestTest1',
        ]);

        // Fetch the product with ID 1 from the database to use in the test.
        // Product(1) is out of stock product
        $product = Product::findOrFail(1);
        $product_id = $product->id;

        // Add the product to the wishlist
        $response = $this->post(route('add-to-wishlist'), [
            'product_id' => $product_id,
            'user_id' => "5",
        ]);

        // Assert that the success message is present in the session
        $response->assertSessionHas('success_wishlist', 'Product added to wishlist!');
        
        // Visit the wishlist page
        $response = $this->get('wishlist');
        // Get the wishlist items for the user
        $wishlist = Wishlist::where('user_id',Auth::id())->get();

        // Assert that each item in the wishlist is displayed on the wishlist page
        foreach ($wishlist as $item) {
            $response->assertSee( $item->products->name );
        }
    
        // delete the user as its not linger needed
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }

    public function test_delete_item_from_wishlist(){

        // Log in as a user
        $this->post('/register', [
            'email' => 'DeleteItemFromWishList@test.com',
            'password' => 'TestTest1',
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
