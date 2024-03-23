<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TabletSortsAndFiltersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_tablet_page_with_sorts_and_filters_url_endpoint(): void
    {
        // Visit the laptop page with sorting by price descending
        $response = $this->get('/Tablet?sort=price_desc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Appletizer iPad Air');
        $response->assertSee('£599.00');

        // Visit the laptop page with sorting by price ascending
        $response = $this->get('/Tablet?sort=price_asc&brand=&release=');
        $response->assertStatus(200);
        $response->assertSee('Samsung Galaxy Tab S6 Lite');
        $response->assertSee('£199.00');

        // Visit the laptop page with filtering by brand
        $response = $this->get('/Tablet?brand=Lenovo&sort=&release=');
        $response->assertStatus(200);
        $response->assertSee('Lenovo Tab P11 Pro');
        $response->assertSee('£299.00');

        // Visit the laptop page with filtering by release year
        $response = $this->get('/Tablet?release=2021&sort=&brand=');
        $response->assertStatus(200);
        $response->assertSee('Huawei MatePad Pro');
        $response->assertSee('£399.00');
    }
}
