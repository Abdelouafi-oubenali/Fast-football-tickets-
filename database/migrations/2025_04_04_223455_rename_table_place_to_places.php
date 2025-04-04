<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTablePlaceToPlaces extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('place', 'place_prix');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('place_prix', 'place');
    }
}
