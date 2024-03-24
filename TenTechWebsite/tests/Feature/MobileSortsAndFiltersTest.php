<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MobileSortsAndFiltersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_mobile_page_with_sorts_and_filters_url_endpoint(): void
    {
        // Visit the laptop page with sorting by price descending
        $response = $this->get('/Mobile?sort=price_desc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('iPhunny 13');
        $response->assertSee('£1399.00');

        // Visit the laptop page with sorting by price ascending
        $response = $this->get('/Mobile?sort=price_asc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Gugle Pixel 5');
        $response->assertSee('£699.00');

        // Visit the laptop page with filtering by brand
        $response = $this->get('/Mobile?brand=Apel&sort=&release=');
        $response->assertStatus(200);
        $response->assertSee('iPhunny 13');
        $response->assertSee('£1399.00');

        // Visit the laptop page with filtering by release year
        $response = $this->get('Mobile?release=2021&sort=&brand=');
        $response->assertStatus(200);
        $response->assertSee('Hawai P40 Pro');
        $response->assertSee('£799.00');
    }
}
