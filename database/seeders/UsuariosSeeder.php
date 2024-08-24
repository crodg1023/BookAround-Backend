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
        $roles = Role::all();

        $roles->each(function($role) {
            Usuario::factory()->count(24)->create([ 'role_id' => $role->id ]);
        });

    }
}
