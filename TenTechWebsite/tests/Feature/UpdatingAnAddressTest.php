<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdatingAnAddressTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_and_update_an_address_correctly(): void
    {
        // need to register first

        $response = $this->post('/register', [
            'email' => 'updatingtheaddresscorrectly@test.com',
            'password' => 'TestTest1',
        ]);

        $response = $this->get('/settings');

        $response->assertStatus(200);

        $response = $this->post('/update-address', [
            'address_line_1' => '123 Test Street',
            'address_line_2' => 'Testville',
            'city' => 'Testington',
            'post_code' => 'TE1 1ST',
            'country' => 'England',
        ]);

        $response->assertSessionHas('success', 'Address updated successfully');
        $response = $this->get('/settings');
        $response->assertStatus(200);

        // assert the address is correct, we can do this by checking the html
        $response->assertSee('123 Test Street');
        $response->assertSee('Testville');
        $response->assertSee('Testington');
        $response->assertSee('TE1 1ST');
        $response->assertSee('England');

        // delete the user as its not linger needed
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }

    public function test_register_and_update_an_address_with_fields_missing(): void
    {
        // need to register first

        $response = $this->post('/register', [
            'email' => 'updatingtheaddresswithfieldsmissing@test.com',
            'password' => 'TestTest1',
        ]);

        $response = $this->get('/settings');

        $response->assertStatus(200);

        $response = $this->post('/update-address', [
            'address_line_1' => '123 Test Street',
            'address_line_2' => 'Testville',
            'city' => 'Testington',
            'post_code' => 'TE1 1ST',
            'country' => null,
        ]);

        $response->assertSessionHas('error', 'All fields are required');
        $response = $this->get('/settings');
        $response->assertStatus(200);

        // assert the address is not there, we can do this by checking the html
        $response->assertSee('Address Information');
        $response->assertSee('<div class="alert alert-warning"', false);
        $response->assertSee('You have not set up your address information yet. Please click "User Address" on the left to set up your address information.', false);
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
