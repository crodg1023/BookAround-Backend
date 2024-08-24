<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            UsuariosSeeder::class,
            ClientesSeeder::class,
            ComerciosSeeder::class,
            CitasSeeder::class,
            ReviewsSeeder::class,
            CategoriesSeeder::class,
            CategoriasComerciosSeeder::class
        ]);
    }
}
