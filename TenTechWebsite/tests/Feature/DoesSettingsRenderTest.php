<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UserAddress;
use App\Models\UserPayments;
use Illuminate\Support\Facades\Auth;

class DoesSettingsRenderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_has_the_side_bar_rendered(): void
    {

        // need to login with the exising user that has the data already seeded

        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => '1',
        ]);

        $response = $this->get('/settings');

        $response->assertStatus(200);
        $response->assertSee('Account Details');
        $response->assertSee('View Recent Orders');
        $response->assertSee('Payment Methods');
        $response->assertSee('User Address');
        $response->assertSee('Change Password');
        $response->assertSee('Change Profile Picture');
        $response->assertSee('Delete Account');

        // lets get the relevant data that would be expected on the page 
        $user = Auth::user();
        $userAddress = UserAddress::where('user_id', $user->id)->first();
        $userPayments = UserPayments::where('user_id', $user->id)->first();
        $lastFourDigits = substr($userPayments->card_number, -4);

        $response->assertSee($user->email);
        $response->assertSee($userAddress->address_line_1);
        $response->assertSee($userAddress->address_line_2);
        $response->assertSee($userAddress->city);
        $response->assertSee($userAddress->postcode);
        $response->assertSee($lastFourDigits);
        $response->assertSee($userPayments->expiry_date);

        // we will not delete this account since it is a default seeded account not that it matters
        // since it will be present after the tests when the database is refreshed
    }
}
