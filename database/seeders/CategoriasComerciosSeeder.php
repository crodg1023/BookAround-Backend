<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comercio;
use App\Models\Categoria;

class CategoriasComerciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comercios = Comercio::all();
        $categorias = Categoria::all();

        foreach($comercios as $comercio) {
            $comercio->categorias()->attach($categorias->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
