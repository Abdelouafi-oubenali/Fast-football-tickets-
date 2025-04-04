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
            $table->unsignedBigInteger('match_id')->nullable(); 
            $table->float('tribune_nord')->default(30); 
            $table->float('tribune_sud')->default(30); 
            $table->float('tribune_est')->default(50); 
            $table->float('tribune_ouest')->default(45); 
            $table->float('VIP')->default(300); 
            $table->timestamps(); 
    
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade'); 
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('place', function (Blueprint $table) {
            $table->dropForeign(['match_id']);
            $table->dropColumn('match_id');

            $table->dropColumn([
                'tribune_nord',
                'tribune_sud',
                'tribune_est',
                'tribune_ouest',
                'VIP',
            ]);
        });
    }
};
