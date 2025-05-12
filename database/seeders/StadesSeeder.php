<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Stades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stades::factory()->count(10)->create();
    }
}
