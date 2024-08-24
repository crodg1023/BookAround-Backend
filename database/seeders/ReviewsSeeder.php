<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Comercio;
use App\Models\Review;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Cliente::all();
        $companies = Comercio::all();

        $customers->each(function($customer) use ($companies) {
            $companies->each(function($company) use ($customer) {
                Review::factory()->create([ 'cliente_id' => $customer->id, 'comercio_id' => $company->id ]);
            });
        });
    }
}
