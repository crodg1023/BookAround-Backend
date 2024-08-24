<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Cliente;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Usuario::whereHas('role', function($query) {
            $query->where('type', 'customer');
        })->get();

        $users->each(function($user) {
            $customer = Cliente::factory()->create([ 'usuario_id' => $user->id ]);
            $user->update([ 'cliente_id' => $customer->id ]);
        });
    }
}
