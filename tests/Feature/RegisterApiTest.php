<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_register_success(): void
    {
        $payload = [
            'name' => 'Udin',
            'email' => 'udin@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ];

        $response = $this->postJson('/api/register', $payload);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'status',
            'message',
            'data' => ['id', 'name', 'email', 'created_at', 'updated_at'],
        ]);

        $response->assertJsonFragment([
            'name' => 'Udin',
            'email' => 'udin@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'udin@example.com',
        ]);
    }

    public function test_register_validation_error(): void
    {
        $payload = [];

        $response = $this->postJson('/api/register', $payload);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'status',
            'message',
            'errors' => ['name', 'email', 'password', 'password_confirmation'],
        ]);
    }
}
