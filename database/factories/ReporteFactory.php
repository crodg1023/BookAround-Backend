<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reporte>
 */
class ReporteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reportable_type = $this->faker->randomElement([
            'App\Models\Cliente',
            'App\Models\Comercio',
            'App\Models\Review'
        ]);

        return [
            'reportable_id' => 1,
            'reportable_type' => $reportable_type,
            'usuario_id' => Usuario::factory()->create(['role_id' => 1]),
            'reason' => $this->faker->sentence()
        ];
    }
}
