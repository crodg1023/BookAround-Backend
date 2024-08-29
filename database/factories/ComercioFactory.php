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
            'phone' => fake()->phoneNumber(),
            'pictures' => fake()->imageUrl(640, 480, 'animals', true),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(0, 200),
            'score' => fake()->randomFloat(1, 0, 5),
            'starting_hour' => fake()->time(),
            'closing_hour' => fake()->time()
        ];
    }
}
