<?php

namespace Database\Seeders;

use App\Models\suscripciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SuscripcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suscripciones::factory(70)->create(); 
    }
}
