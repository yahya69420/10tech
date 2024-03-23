<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdatingAPasswordTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_and_update_the_password_and_log_back_in(): void
    {
        // need to register first

        $response = $this->post('/register', [
            'email' => 'updatingthepassword@test.com',
            'password' => 'TestTest1',
        ]);

        $response = $this->get('/settings');

        $response->assertStatus(200);

        $response = $this->post('/update-password', [
            'old-password' => 'TestTest1',
            'new-password' => 'TestTest2',
            'confirm-new-password' => 'TestTest2',
        ]);


        $response->assertSessionHas('success', 'Password updated successfully');
        $response = $this->get('/settings');
        $response->assertStatus(200);
    }

    public function test_logout(): void
    {
        $response = $this->get('/logout');
        $response->assertRedirect('/');
        $response->assertStatus(302);
    }

    public function test_login_with_new_password(): void
    {
        $response = $this->post('/login', [
            'email' => 'updatingthepassword@test.com',
            'password' => 'TestTest2',
        ]);

        // lets assert that an actual auth route can be accessed like /settings
        $response = $this->get('/settings');
        $response->assertStatus(200);

        // delete the user as its not linger needed
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }
}
