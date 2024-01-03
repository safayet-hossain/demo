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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',20)->nullable();
            $table->string('email')->nullable();  
            $table->string('phone',20)->nullable();         
            $table->string('address',50)->nullable();         
            $table->string('age',20)->nullable();         
            $table->text('gender')->nullable();
            $table->string('Skill')->nullable();
            $table->string('image')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
