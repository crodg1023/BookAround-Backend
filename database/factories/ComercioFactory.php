<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comercio>
 */
class ComercioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'address' => fake()->unique()->address(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'description' => fake()->paragraph(),
            'score' => fake()->randomFloat(2, 0, 10)
        ];
    }
}
