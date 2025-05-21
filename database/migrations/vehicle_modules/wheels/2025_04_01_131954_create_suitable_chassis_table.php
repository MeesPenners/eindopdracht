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
        Schema::create('suitable_chassis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wheel_id')->constrained('wheels')->onDelete('cascade');
            $table->foreignId('chassis_id')->constrained('chassis')->onDelete('cascade');
            $table->softDeletes();

            // Prevent duplicate combinations
            $table->unique(['wheel_id', 'chassis_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suitable_chassis');
    }
};
