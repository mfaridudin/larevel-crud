<?php

namespace Tests\Feature;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SiswaTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_siswa_view(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/siswa');

        $response->assertStatus(200);
        $response->assertViewIs('siswa.siswa');
    }

    public function test_user_can_insert_siswa()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $payload = [
            'nama_siswa' => 'Bermain Bola',
            'nisn_siswa' => '0000000000',
        ];

        $response = $this->withoutMiddleware()
            ->post('/siswa', $payload); 

        $response->assertStatus(302);
        $response->assertRedirect('/siswa');

        $this->assertDatabaseHas('siswa', [
            'nama' => 'Bermain Bola',
        ]);

          $this->assertDatabaseHas('nisn', [
            'nisn' => '0000000000',
        ]);
    }
}