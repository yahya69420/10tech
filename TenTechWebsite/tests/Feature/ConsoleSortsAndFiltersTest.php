<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsoleSortsAndFiltersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_console_page_with_sorts_and_filters_url_endpoint(): void
    {
        // Visit the laptop page with sorting by price descending
        $response = $this->get('/Console?sort=price_desc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('PrayStation 5');
        $response->assertSee('£499.00');

        // Visit the laptop page with sorting by price ascending
        $response = $this->get('/Console?sort=price_asc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Nintendo Switch Lite');
        $response->assertSee('£199.00');

        // Visit the laptop page with filtering by brand
        $response = $this->get('/Console?brand=Microsoft&sort=&release=');
        $response->assertStatus(200);
        $response->assertSee('Xbox Series X');
        $response->assertSee('£499.00');

        // Visit the laptop page with filtering by release year
        $response = $this->get('/Console?release=2020&sort=&brand=');
        $response->assertStatus(200);
        $response->assertSee('PrayStation 4');
        $response->assertSee('£399.00');
    }
}
