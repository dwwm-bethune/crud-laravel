<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => fake()->word(),
            'model' => fake()->word(),
            'slug' => fake()->slug(2),
            'content' => fake()->text(),
            'image' => fake()->imageUrl(),
            'state' => fake()->boolean(),
            'user_id' => User::factory(),
        ];
    }
}
