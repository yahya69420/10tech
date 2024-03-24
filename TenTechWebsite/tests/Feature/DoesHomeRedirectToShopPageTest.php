<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoesHomeRedirectToShopPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_redirects_to_shop_page(): void
    {

        // we need to to login first due to the /home endpoint being a laravel default auth endpoint
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        // we gp to /home endpoit
        $response = $this->get('/home');
        // does it redirect to /shop
        $response->assertRedirect('/');
        // we check if the status is 302 due to the redirect
        $response->assertStatus(302);
    }
}
