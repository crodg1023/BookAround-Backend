<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Comercio;

class ComerciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Usuario::whereHas('role', function($query) {
            $query->where('type', 'company');
        })->get();

        $users->each(function($user) {
            $company = Comercio::factory()->create([ 'usuario_id' => $user->id ]);
            $user->update([ 'comercio_id' => $company->id ]);
        });
    }
}
