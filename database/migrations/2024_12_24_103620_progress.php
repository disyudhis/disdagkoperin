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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attendance_id')->nullable();
            $table->foreign('attendance_id')->references('id')->on('attendance')->onDelete('cascade');
            $table->unsignedBigInteger('subtopic_id')->nullable();
            $table->foreign('subtopic_id')->references('id')->on('subtopics')->onDelete('cascade');
            $table->boolean('is_completed')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
