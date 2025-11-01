<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camaro;

class CamaroSeeder extends Seeder
{
    public function run(): void
    {
        // Maak 10 dummy Camaros
        Camaro::factory()->count(10)->create();
    }
}
