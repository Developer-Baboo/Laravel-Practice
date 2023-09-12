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
            $table->integer('student_id');
            $table->primary('student_id');
            $table->string('name')->unique();
            $table->string('email')->nullable();
            $table->string('city')->default('no city name');
            $table->float('percentage')->comment("Student Percentage");
            $table->integer('age')->unsigned();
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
