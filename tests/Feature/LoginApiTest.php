<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_login_success(): void
    {
        $user = User::factory()->create([
            'email' => 'udin@example.com',
            'password' => Hash::make('secret123'),
        ]);

        $payload = [
            'email' => 'udin@example.com',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/api/login', $payload);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'message',
            'token',
        ]);

        $response->assertJson([
            'status' => 'true',
            'message' => 'Login berhasil',
        ]);
    }

    public function test_login_invalid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'udin@example.com',
            'password' => Hash::make('secret123'),
        ]);

        $payload = [
            'email' => 'udin@example.com',
            'password' => 'wrongpassword',
        ];

        $response = $this->postJson('/api/login', $payload);

        $response->assertStatus(401);
        $response->assertJson([
            'status' => 'false',
            'message' => 'Email atau Password tidak sesuai',
        ]);
    }

    public function test_login_validation_error(): void
    {
        $payload = [];

        $response = $this->postJson('/api/login', $payload);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'status',
            'message',
            'errors' => ['email', 'password'],
        ]);
    }
}
