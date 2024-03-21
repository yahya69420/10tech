<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItems;
class ReviewTest extends TestCase
{
    
    public function testReviewPage()
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

        // Assert the response status is 200 (OK)
        $response->assertStatus(200);

    }
}
