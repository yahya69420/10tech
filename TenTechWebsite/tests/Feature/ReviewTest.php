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

        // Fetch a product from the database
        $product = Product::findOrFail(3);
        $response = $this->get('productdetail/3');

        $response->assertStatus(200);

        
        $response->assertSee("Admin Admin");
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

        $this->post('/register', [
            'email' => 'userisnotallowedtoreview@test.com',
            'password' => 'TestTest1',
        ]);

        $response = $this->get('productdetail/3');
        $response->assertStatus(200);

        $response = $this->get('add-review/3/userreview');
        $response->assertStatus(200);

            
        $response->assertViewHas('verified_purchase', false);
        $response->assertSee("You are not eligible to review this product");
        $response->assertSee("Only verified purchasers can submit reviews to ensure authenticity. Thank you for understanding");
        $response->assertSee('<div class="alert alert-danger"', false);

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

        $response = $this->get('productdetail/2');
        $response->assertStatus(200);

        $response = $this->get('add-review/2/userreview');
        $response->assertStatus(200);

        // Fetch the product with ID 3 from the database to use in the test.
        $product = Product::findOrFail(2);
        $product_id = $product->id;

        $response = $this->post("add-review",[ 
            'product_id'=> '2',
            'user_review' => 'Unit test review',
        ]);

        $response->assertSessionHas('status', "Thank you for writing a review");

        DB::table('reviews')->where('id', 7)->delete();

    }

    public function test_edit_user_review()
    {

        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        $response = $this->get('productdetail/2');
        $response->assertStatus(200);
        $response->assertSee("Great condition! Really happy with my Mac book pro! Highly recommend this website for quality products.");
        $response = $this->get('edit-review/2/userreview');
        $response->assertStatus(200);

        $response = $this->post("update-review",[ 
            'review_id'=> '4',
            'user_review' => 'Unit test update',
        ]);
        
        $response->assertSessionHas('status', "Thank you for writing a review");
        $response = $this->get('productdetail/2');
        $response->assertStatus(200);
        
        $response->assertSee("Unit test update");
    
    }

}
