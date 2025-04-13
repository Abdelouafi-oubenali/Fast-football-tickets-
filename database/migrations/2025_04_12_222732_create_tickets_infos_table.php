<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('match_id');
            $table->string('category');
            $table->integer('quantity');
            $table->float('price');
            $table->integer('totla_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets_infos');
    }
};
