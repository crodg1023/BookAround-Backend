<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Cliente;
use App\Models\Comercio;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::pluck('id')->toArray();

        Usuario::factory(50)->create([
            'role_id' => function () use ($roles ) {
                return $roles[array_rand($roles)];
            }
        ]);
    }
}
