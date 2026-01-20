<?php

namespace Database\Factories;

use App\Models\Hobbies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hobbies>
 */
class HobbiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Hobbies::class;

    public function definition(): array
    {
        return [
            'hobby' => $this->faker->word(),
        ];
    }
}
