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
        Schema::create('chassis', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('wheel_amount_id')->constrained('wheel_amounts')->onDelete('cascade');
            $table->foreignId('vehicle_type_id')->constrained('vehicle_types')->onDelete('cascade');
            $table->bigInteger('length')->nullable();
            $table->bigInteger('width')->nullable();
            $table->bigInteger('height')->nullable();
            $table->bigInteger('time')->comment('Time to assemble the chassis in hours');
            $table->decimal('costs', 10, 2);
            $table->string('image')->default('image_not_set.png')->comment('Image path for the chassis');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chassis');
    }
};
