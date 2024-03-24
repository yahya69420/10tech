<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoesGoingToSettingsPageWorkTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_does_going_to_settings_page_work(): void
    {

        // need to register first

        $response = $this->post('/register', [
            'email' => 'goingtosettings@test.com',
            'password' => 'TestTest1',
        ]);
        
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
