<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class LaptopPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_laptop_page_returns_200_and_expected_content(): void
    {

        // Arrange
        $laptops = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 5);
        // Act
        // Assert
        $response = $this->get('/Laptop');
        $response->assertStatus(200);
        $response->assertSee('Laptops');
        $response->assertSee('Discover the latest laptops for the best prices');

        foreach ($laptops as $laptop) {
            $response->assertSee($laptop->name);
            $response->assertSee('$' . $laptop->price);
            $response->assertSee($laptop->image);
        }
    }
}
