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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('college');
            $table->string('year');
            $table->string('level');
            $table->string('department');
            $table->string('program');
            $table->string('language');
            $table->string('status');
            $table->string('nationality');
            $table->string('male_freshmen'); 
            $table->string('female_freshmen'); 
            $table->string('male_remain'); 
            $table->string('female_remain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
