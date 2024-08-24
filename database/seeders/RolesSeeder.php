<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente_role = new Role();
        $cliente_role->type = 'customer';
        $cliente_role->save();

        $comercio_role = new Role();
        $comercio_role->type = 'company';
        $comercio_role->save();
    }
}
