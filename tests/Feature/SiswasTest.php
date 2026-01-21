<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\siswas;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiswasTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_siswas_view(): void
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/siswas');

        $response->assertStatus(200);
        $response->assertViewIs('siswas.siswas');
    }

    public function user_can_insert_siswas()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        siswas::factory()->count(3)->create();

        $response = $this->get('/siswas/create');

        $response->assertStatus(200);
        $response->assertViewIs('siswas.create');
    }

    public function test_user_can_insert_siswas()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $payload = [
            'nama' => 'Bermain Bola',
            'phone_numbers' => ['0000000000', '1111111111']
        ];

        $response = $this->withoutMiddleware()
            ->post('/siswas', $payload);

        $response->assertStatus(302);
        $response->assertRedirect('/siswas');

        $this->assertDatabaseHas('siswas', [
            'nama' => 'Bermain Bola',
        ]);

        $this->assertDatabaseHas('phone_numbers', [
            'phone_number' => ['0000000000', '1111111111'],
        ]);
    }
}
