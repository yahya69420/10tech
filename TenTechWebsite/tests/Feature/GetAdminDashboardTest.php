<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAdminDashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function tst_example(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(200);
    }
}
