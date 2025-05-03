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
        Schema::table('Ticket', function (Blueprint $table) {
            $table->renameColumn('totla_price', 'total_price');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Ticket', function (Blueprint $table) {
            $table->renameColumn('total_price', 'totla_price');

        });
    }
};
