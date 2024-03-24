<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LaptopSortsAndFiltersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_laptop_page_with_sorts_and_filters_url_endpoint(): void
    {
        // Visit the laptop page with sorting by price descending
        $response = $this->get('/Laptop?sort=price_desc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Aurora ZenBook Ultra');
        $response->assertSee('£1699.00');

        // Visit the laptop page with sorting by price ascending
        $response = $this->get('/Laptop?sort=price_asc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Macpad Air');
        $response->assertSee('£999.00');

        // Visit the laptop page with filtering by brand
        $response = $this->get('/Laptop?brand=Apel&sort=&release=');
        $response->assertStatus(200);
        $response->assertSee('Macpad Air');
        $response->assertSee('£999.00');
        $response->assertSee('Macpad Pro');
        $response->assertSee('£1299.00');

        // Visit the laptop page with filtering by release year
        $response = $this->get('Laptop?release=2021&sort=&brand=');
        $response->assertStatus(200);
        $response->assertSee('IDall XPS 13');
        $response->assertSee('£1399.00');
        $response->assertSee('Lumina FlexPro');
        $response->assertSee('£1499.00');
    }
}
