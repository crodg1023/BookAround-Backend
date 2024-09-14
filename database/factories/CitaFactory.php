<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::create(2024, 1, 1);
        $end = Carbon::create(2024, 12, 31);
        $status = ['active', 'canceled', 'fulfilled'];

        return [
            'date_time' => Carbon::instance(fake()->dateTimeBetween($start, $end))->format('Y-m-d H:i:s'),
            'status' => $status[rand(0, count($status) - 1)]
        ];
    }
}
