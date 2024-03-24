<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoesLogoutWorkTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_to_test_the_logout(): void
    {
        // register a user
        $response = $this->post('/register', [
            'email' => 'logouttest@test.com',
            'password' => 'TestTest1',
        ]);

        // logout
        $response = $this->get('/logout');
        $response->assertRedirect('/');
        $response->assertStatus(302);

        // lets log back in to the delete the account
        $response = $this->post('/login', [
            'email' => 'logouttest@test.com',
            'password' => 'TestTest1',
        ]);


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
