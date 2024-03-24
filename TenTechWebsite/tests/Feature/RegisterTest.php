<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_registering_of_user_correctly(): void
    {
        $response = $this->post('/register', [
            'email' => 'unittest@test.com',
            'password' => 'TestTest1',
        ]);
        // it will redirect to the index entry point, but will redirect to the shop
        $response->assertRedirect('/home');
        $response->assertStatus(302);

        // delethe ttat user
        $email = User::where('email', 'unittest@test.com',)->first();
        $email->delete();

       }

    public function test_registering_of_user_with_existing_email(): void
    {
        $response = $this->post('/register', [
            'email' => 'admin@admin.com', // this email is already in the database
            'password' => 'TestTest1',
        ]);
        // it will redirect to the register page, since hte email has to tbe unique and ius chhecked int hte controller 
        $response->assertStatus(302);
    }

    public function test_registering_of_user_with_weak_password(): void
    {
        $response = $this->post('/register', [
            'email' => 'admin2@admin2.com',
            'password' => '2',
        ]);
        // it will redirect to the register page, since hte passwrod has to tbe strong and it will be checked in the controller
        $response->assertStatus(302);
    }
}
