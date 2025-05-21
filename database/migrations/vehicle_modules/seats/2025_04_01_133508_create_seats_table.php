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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('seat_material_id')->constrained('seat_materials')->onDelete('cascade');
            $table->bigInteger('time')->comment('Time to assemble the seat in hours');
            $table->decimal('costs', 10, 2);
            $table->string('image')->default('image_not_set.png')->comment('Image path for the seat');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
