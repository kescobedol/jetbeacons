<?php

namespace Database\Seeders;

use App\Models\Beacon;
use App\Models\Contenido;
use App\Models\Institucione;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Institucione::factory(5)->create();
        Beacon::factory(10)->create();
        Contenido::factory(20)->create();
    }
}
