<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class MobilePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_mobile_page_returns_200_and_expected_content(): void
    {

        // Arrange
        $mobiles = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 1);
        // Act
        // Assert
        $response = $this->get('/Mobile');
        $response->assertStatus(200);
        $response->assertSee('Mobile Phones');
        $response->assertSee('Discover the latest phones for the best prices');

        foreach ($mobiles as $mobile) {
            $response->assertSee($mobile->name);
            $response->assertSee('£' . $mobile->price);
            $response->assertSee($mobile->image);
        }
    }
}
