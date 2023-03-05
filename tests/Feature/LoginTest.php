<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    // use RefreshDatabase;

    public function test_Login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    
}
