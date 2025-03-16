<?php

namespace Database\Seeders;

use App\Models\Matchs;
use App\Models\tickets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tickets::factory()->count(20)->create();
    }
}
