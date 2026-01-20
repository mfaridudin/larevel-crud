<?php

namespace Tests\Feature;

use App\Models\Hobbies;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HobbyApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        Hobbies::factory()->count(3)->create();

        $response = $this->getJson('/api/hobby');

        $response->assertStatus(200);

        $response->assertJsonCount(3);

        $response->assertJsonStructure([
            'status',
            'massage',
            'data' => [
                '*' => ['id', 'hobby'],
            ],
        ]);
    }
}
