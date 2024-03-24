<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ConsolePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_console_page_returns_200_and_expected_content(): void
    {
        // Arrange
        $consoles = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 2);
        // Act
        // Assert
        $response = $this->get('/Console');
        $response->assertStatus(200);
        $response->assertSee('Consoles');
        $response->assertSee('Discover the latest consoles for the best prices');

        foreach ($consoles as $console) {
            $response->assertSee($console->name);
            $response->assertSee('$' . $console->price);
            $response->assertSee($console->image);
        }
    }

    // test that the test passes when the content of the page was not expected
    public function test_console_page_returns_200_and_unexpected_content(): void
    {
        // Arrange
        $tablets = Product::join('category_product', 'products.id', '=', 'category_product.product_id')
            ->where('category_product.category_id', 2);
        // Act
        // Assert
        $response = $this->get('/Console');
        $response->assertStatus(200);
        $response->assertSee('Consoles');
        $response->assertSee('Discover the latest consoles for the best prices');

        // for any of the tablets that are displayed on the page, the page should not contain the word 'Laptops'
        foreach ($tablets as $tablet) {
            $response->assertDontSee('Laptops');
            $response->assertDontSee('Discover the latest laptops for the best prices');
        }
    }
}
