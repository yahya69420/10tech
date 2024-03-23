<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MonitorSortsAndFiltersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_monitor_page_with_sorts_and_filters_url_endpoint(): void
    {
        // Visit the laptop page with sorting by price descending
        $response = $this->get('/Monitor?sort=price_desc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Asus ROG Swift PG27UQ');
        $response->assertSee('£1099.00');

        // Visit the laptop page with sorting by price ascending
        $response = $this->get('/Monitor?sort=price_asc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Dell UltraSharp U2720QWERTY');
        $response->assertSee('£699.00');

        // Visit the laptop page with filtering by brand
        $response = $this->get('/Monitor?brand=Acer&sort=&release=');
        $response->assertStatus(200);
        $response->assertSee('Acer Predator X27');
        $response->assertSee('£999.00');

        // Visit the laptop page with filtering by release year
        $response = $this->get('Monitor?release=2021&sort=&brand=');
        $response->assertStatus(200);
        $response->assertSee('LG UltraGear 27GN950');
        $response->assertSee('£799.00');
    }
}
