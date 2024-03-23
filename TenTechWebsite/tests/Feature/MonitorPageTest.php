<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class MonitorPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_monitors_page_returns_200_and_expected_content(): void
    {
        // Arrange
        $monitors = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 3);
        // Act
        // Assert
        $response = $this->get('/Monitor');
        $response->assertStatus(200);
        $response->assertSee('Monitors');
        $response->assertSee('Discover the latest monitors for the best prices');

        foreach ($monitors as $monitor) {
            $response->assertSee($monitor->name);
            $response->assertSee('$' . $monitor->price);
            $response->assertSee($monitor->image);
        }
    }
}
