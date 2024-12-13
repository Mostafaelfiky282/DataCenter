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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('college');
            $table->string('nationality')->nullable();   
            $table->string('program')->nullable();  
            $table->string('level_zero')->nullable(); 
            $table->string('level_one');
            $table->string('level_two');
            $table->string('level_three');
            $table->string('level_four');
            $table->string('level_five')->nullable();
            $table->string('level_six')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
