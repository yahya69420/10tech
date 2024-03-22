<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
class RatingTest extends TestCase
{
    
    public function test_product_exists_in_database()
    {
        $product = Product::findOrFail(2);
        $this->assertTrue(!is_null($product), 'Product found in the database.');
    }
    
    // This code is simulating a test user who has already purchased a product for
    // submitting a rating for that product.
    public function test_submit_rating()
    {
        // Log in a user
        $this->post('/register', [
            'email' => 'submitratingtest@test.com',
            'password' => 'TestTest1',
        ]);
        // Access Product Page
        $response = $this->get('/productdetail/10');
        
        // Fetch a product from the database
        $product = Product::findOrFail(10);
        $response = $this->post('/add-rating', [
            'product_id' => $product->id, // Correct the parameter name
            'product_rating' => 3, // Set the rating to 3
        ]);

        $response = $this->get('/settings');
 
        $response->assertStatus(200);
        // $response->assertRedirect();

        $response = $this->post('/delete-account');
        
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }
}


