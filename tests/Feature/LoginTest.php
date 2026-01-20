<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_login_view_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertViewIs('Auth.login');
    }

    public function test_login_success()
    {
        $user = User::factory()->create([
            'email' => 'udin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->withSession([]);

        $token = csrf_token();

        $response = $this->post('/login', [
                '_token' => $token,
                'email' => 'udin@example.com',
                'password' => 'password123',
            ]);

        $response->assertRedirect('/siswa');
        $this->assertAuthenticatedAs($user);
    }
}
