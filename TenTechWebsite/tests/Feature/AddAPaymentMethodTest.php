<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddAPaymentMethodTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register_and_add_a_payment_method_correctly(): void
    {
        // need to register first

        $response = $this->post('/register', [
            'email' => 'updatingthepaymentmethodcorrectly@test.com',
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

        // delete the user as its not linger needed
        $response = $this->post('/delete-account');
        // the session for the success message
        $response->assertSessionHas('success', 'Account deleted successfully');
        // clear the session data
        session()->forget('success');
        // did we get redirected?
        $response->assertStatus(302);
    }

    public function test_register_and_add_a_payment_method_with_fields_missing(): void
    {
        // need to register first

        $response = $this->post('/register', [
            'email' => 'updatingthepaymentmethodwithfieldsmissing@test.com',
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
            'cvv' => null,
        ]);

        $response->assertSessionHas('error', 'All fields are required');
        $response = $this->get('/settings');
        $response->assertStatus(200);

        // assert the payment is not there, we can do this by checking the html
        $response->assertSee('Payment Information');
        // the false allows for a raw html search
        $response->assertSee('<div class="alert alert-warning"', false);
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
