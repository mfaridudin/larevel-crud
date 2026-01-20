<?php

namespace Tests\Feature;

use App\Models\Hobbies;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HobbiesTest extends TestCase
{
    use RefreshDatabase;

    public function test_hobbies_view_can_be_rendered()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/hobbies');

        $response->assertStatus(200);
        $response->assertViewIs('hobbies.hobbies');
    }

   
    public function test_user_can_insert_hobbies()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Hobbies::factory()->count(3)->create();

        $response = $this->get('/hobbies/create');

        $response->assertStatus(200);
        $response->assertViewIs('hobbies.create');
    }

    public function user_can_insert_hobby()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $payload = [
            'hobby' => 'Bermain Bola',
        ];

        $response = $this->post('/hobbies/create', $payload);

        $response->assertStatus(302); 
        $response->assertRedirect('/hobbies'); 

        $this->assertDatabaseHas('hobbies', [
            'hobby' => 'Bermain Bola',
        ]);
    }
}
