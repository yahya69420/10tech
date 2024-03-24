<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItems;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
class ReviewTest extends TestCase
{

    public function test_can_we_see_a_review()
    {
        // Log in a user
        $this->post('/register', [
            'email' => 'canweseeareview@test.com',
            'password' => 'TestTest1',
        ]);

         // Simulate accessing the product detail page for product with ID 3
        $response = $this->get('productdetail/3');

        // Assert that the page is successfully loaded (status code 200)
        $response->assertStatus(200);

        // Assert that the response contains the name of the reviewer "Admin Admin"
        $response->assertSee("Admin Admin");
        // Assert that the response contains the review text
        $response->assertSee("Seriously impressed with this machine. The spec is no surprise, it's what I ordered");
        
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }

    public function test_user_is_not_allowed_to_create_a_review() {
        // Register a new user
        $this->post('/register', [
            'email' => 'userisnotallowedtoreview@test.com',
            'password' => 'TestTest1',
        ]);
        // Access the product detail page for product with ID 3
        $response = $this->get('productdetail/3');
        $response->assertStatus(200);

        // Access the page for adding a review for product with ID 3 as a non-verified user
        $response = $this->get('add-review/3/userreview');
        $response->assertStatus(200);

        // Assert that the view does not have the 'verified_purchase' variable set to true
        $response->assertViewHas('verified_purchase', false);
        $response->assertSee("You are not eligible to review this product");
        $response->assertSee("Only verified purchasers can submit reviews to ensure authenticity. Thank you for understanding");
        $response->assertSee('<div class="alert alert-danger"', false);
        // Simulate deleting the user account
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }

    public function test_user_creating_a_review()
    {
        // simulates a user logging into the application
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);
        // Visit the product detail page for product with ID 2
        $response = $this->get('productdetail/2');
        $response->assertStatus(200);

        // Visit the page to add a review for product with ID 2
        $response = $this->get('add-review/2/userreview');
        $response->assertStatus(200);

        // Fetch the product with ID 3 from the database to use in the test.
        $product = Product::findOrFail(2);
        $product_id = $product->id;

        // Post a review for product with ID 2
        $response = $this->post("add-review",[ 
            'product_id'=> '2',
            'user_review' => 'Unit test review',
        ]);

        // Assert that the session has a status message confirming successful review submission
        $response->assertSessionHas('status', "Thank you for writing a review");
        // Delete the review created during the test to clean up the database
        DB::table('reviews')->where('id', 7)->delete();
    }

    public function test_edit_user_review()
    {
        // Simulate a user logging into the application
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);
        // Visit the product detail page for product with ID 2
        $response = $this->get('productdetail/2');
        $response->assertStatus(200);
        // Assert that the response contains the existing review text
        $response->assertSee("Great condition! Really happy with my Mac book pro! Highly recommend this website for quality products.");
        $response = $this->get('edit-review/2/userreview');
        $response->assertStatus(200);

        // Visit the page to edit a review for product with ID 2
        $response = $this->post("update-review",[ 
            'review_id'=> '4',
            'user_review' => 'Unit test update',
        ]);
        
        // Update the review with ID 4
        $response->assertSessionHas('status', "Thank you for writing a review");

        // Visit the product detail page for product with ID 2 again
        $response = $this->get('productdetail/2');
        $response->assertStatus(200);
        
        // Assert that the updated review text is visible on the page
        $response->assertSee("Unit test update");
    }

}
