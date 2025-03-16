<?php

namespace Database\Seeders;

use App\Models\Matchs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matchs::factory()->count(20)->create();
    }
}
