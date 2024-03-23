<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_page_is_rendered(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_users_can_login_with_correct_creds(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => '1',
        ]);
        $response->assertRedirect('admin/dashboard');
        // 302 status code is for redirection
        $response->assertStatus(302);
    }

    public function test_users_cannot_login_with_incorrect_email(): void
    {
        $response = $this->post('/login', [
            'email' => 'admien@admin.com',
            'password' => '1',
        ]);
        // 302 status code is for redirection back to login page due ot hte incorrect email
        $response->assertStatus(302);
    }

    public function test_users_cannot_login_with_incorrect_pass(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'wrongpassword',
        ]);
        // 302 status code is for redirection back to login page due ot hte incorrect email
        $response->assertStatus(302);
    }
}
