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
        Schema::table('students', function (Blueprint $table) {
            // $table->renameColumn('city', 'cities');
            // $table->dropColumn('city');
            // $table->string('name', 50)->default('no name')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Here you would define the reverse changes if needed
            // For example, you might re-add the dropped column and reverse the changes to the 'name' column.
        });
    }
};
