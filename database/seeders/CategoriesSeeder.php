<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cocina = new Categoria();
        $cocina->type = 'cocina';
        $cocina->name = 'Cocina local';
        $cocina->icon = 'fa-solid fa-utensils';
        $cocina->save();

        $barberia = new Categoria();
        $barberia->type = 'barberia';
        $barberia->name = 'Barbería';
        $barberia->icon = 'fa-solid fa-scissors';
        $barberia->save();

        $belleza = new Categoria();
        $belleza->type = 'belleza';
        $belleza->name = 'Belleza';
        $belleza->icon = 'fa-solid fa-paintbrush';
        $belleza->save();

        $bar = new Categoria();
        $bar->type = 'bar';
        $bar->name = 'Bar';
        $bar->icon = 'fa-solid fa-wine-glass';
        $bar->save();

        $panaderia = new Categoria();
        $panaderia->type = 'panaderia';
        $panaderia->name = 'Panadería';
        $panaderia->icon = 'fa-solid fa-bread-slice';
        $panaderia->save();

        $spa = new Categoria();
        $spa->type = 'spa';
        $spa->name = 'Spa';
        $spa->icon = 'fa-solid fa-spa';
        $spa->save();

        $cafe = new Categoria();
        $cafe->type = 'cafe';
        $cafe->name = 'Café';
        $cafe->icon = 'fa-solid fa-mug-hot';
        $cafe->save();

        $ropa = new Categoria();
        $ropa->type = 'ropa';
        $ropa->name = 'Ropa';
        $ropa->icon = 'fa-solid fa-shirt';
        $ropa->save();
    }
}
