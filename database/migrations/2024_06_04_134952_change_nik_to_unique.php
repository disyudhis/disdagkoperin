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
            // First, ensure there are no duplicate NIKs in the database
            $duplicates = \DB::table('users')
                ->select('nik')
                ->groupBy('nik')
                ->havingRaw('COUNT(*) > 1')
                ->get();

            if ($duplicates->isNotEmpty()) {
                throw new Exception("Duplicate NIK values found. Ensure all NIK values are unique before adding the unique constraint.");
            }

            // Add unique constraint to the nik column
            $table->unique('nik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the unique constraint from the nik column
            $table->dropUnique(['nik']);
        });
    }
};
