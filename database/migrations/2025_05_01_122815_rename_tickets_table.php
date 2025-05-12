<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::rename('tickets', 'matches');
    }
    
    public function down()
    {
        Schema::rename('matches', 'tickets');
    }
    
};
