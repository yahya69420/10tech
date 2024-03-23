<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeletingAPaymentMethod extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register_and_delete_an_existing_pamyent_method_correctly(): void
    {
        // need to register first

        $response = $this->post('/register', [
            'email' => 'deletingthepaymentmethodcorrectly@test.com',
            'password' => 'TestTest1',
        ]);

        $response = $this->get('/settings');

        $response->assertStatus(200);

        $response = $this->post('/addpaymentinfo', [
            'card_number' => '9876 9876 9876 9876',
            'cardType' => 'Mastercard',
            'cardColour' => '#1a1f71',
            'card_holder_name' => 'Test Test',
            'expiry_date' => '12/23',
            'cvv' => '123',
        ]);

        $response->assertSessionHas('success', 'Payment card added successfully');
        $response = $this->get('/settings');
        $response->assertStatus(200);

        $response->assertSee('XXXX XXXX XXXX 9876');
        $response->assertSee('TEST TEST');
        $response->assertSee('12/23');

        $response = $this->post('/delete-payment-method');

        $response->assertSessionHas('success', 'Payment card deleted successfully');
        $response = $this->get('/settings');
        $response->assertStatus(200);
        // check the page for the warning message that only shows when no payment methods are set up
        // the false parameter is to make sure the html is not escaped and the raw html is checked
        $response->assertSee('<div class="alert alert-warning"', false);
        // check the page for the warning message that only shows when no payment methods are set up
        $response->assertSee('You have not set up your payment information yet. Please click "Payment Methods" on the left to set up your payment information.', false);

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
