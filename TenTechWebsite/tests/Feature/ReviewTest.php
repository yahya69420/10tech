<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItems;
class ReviewTest extends TestCase
{
    
    public function tstReviewPage()
    {
        // Log in a user
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        // Fetch a product from the database
        $product = Product::findOrFail(3);

        // Mock route parameters
        $product_id = $product->id;

        $verified_purchase = OrderItems::whereHas('order', function ($query) use ($product_id) {
            $query->where('user_id', Auth::id());
        })->where('product_id', $product_id)->exists();
        // Hit the route

        // If user has not purchased the item, return early with message
        if (!$verified_purchase) {
            $this->markTestSkipped('User  not eligible to review this product, Error Message is displayed, skipping review test.');
            return;
        }
        // otherwise , the user is able to review the product
        $response = $this->get(route('add-review.userreview', ['product_id' => $product_id]));

        // Assert the response status is 200 (OK) , correct view is return
        $response->assertStatus(200);

    }

    public function tst_user_creating_a_review() {

        // simulates a user logging into the application
        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        // Fetch the product with ID 3 from the database to use in the test.
        $product = Product::findOrFail(3);
        $product_id = $product->id;

        // Check if the currently authenticated user has purchased the product.
        $verified_purchase = OrderItems::whereHas('order', function ($query) use ($product_id) {
            $query->where('user_id', Auth::id());
        })->where('product_id', $product_id)->exists();

        // If the user has not purchased the product, skip the test.
        // Only users who have verified their purchase should be able to leave a review
        if (!$verified_purchase) {
            $this->markTestSkipped('Not eligble to review, Skipping Test');
            return;
        }
        // Submit a POST request to the '/add-review' route with the product ID and a sample review text.
        // This mimics the action of a user submitting a review form in the application.
        $response = $this->post('/add-review', [
            'product_id' => $product->id,
            'user_review' => 'This is a test review',
        ]);
        
        // After submitting the review, check if the session has a specific message.
        // This assertion verifies that the application redirects with a success message
        // indicating the review was successfully submitted.
        $response->assertSessionHas('status', "Thank you for writing a review");
    }

    public function test_edit_user_review() {

        $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        $product = Product::findOrFail(2);
        $product_id = $product->id;

        $verified_purchase = OrderItems::whereHas('order', function ($query) use ($product_id) {
            $query->where('user_id', Auth::id());
        })->where('product_id', $product_id)->exists();

        // If the user has not purchased the product, skip the test.
        // Only users who have verified their purchase should be able to leave a review
        if (!$verified_purchase) {
            $this->markTestSkipped('Not eligble to review, Skipping Test');
            return;
        }
        $response = $this->get("/edit-review/{$product->id}/userreview");

        // Assert the response is OK and the correct view is returned
        $response->assertStatus(200);
    }
}
