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
        Schema::create('place', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->nullable(); 
            $table->integer('tribune_nord')->default(0);
            $table->integer('tribune_sud')->default(0);
            $table->integer('tribune_est')->default(0);
            $table->integer('tribune_ouest')->default(0);
            $table->integer('VIP')->default(0);
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place');
    }
};
