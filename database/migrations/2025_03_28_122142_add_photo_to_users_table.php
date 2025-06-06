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
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable();
            $table->text('adresse')->nullable();     
            $table->text('number_phone')->nullable();  
            $table->text('About')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo');     
            $table->dropColumn('adresse');   
            $table->dropColumn('number_phone'); 
            $table->dropColumn('About'); 
        });
    }
    
};
