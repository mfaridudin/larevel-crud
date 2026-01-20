<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
// use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_view_can_be_rendered()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }


    public function test_user_can_register_successfully()
    {
        $payload = [
            'name' => 'Udin Farid',
            'email' => 'udin@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->withoutMiddleware()->post('/register', $payload);

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('users', [
            'email' => 'udin@example.com',
        ]);
        $user = User::where('email', 'udin@example.com')->first();
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    public function test_register_validation_errors()
    {
        $response = $this->withoutMiddleware()->post('/register', []);
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }
}
