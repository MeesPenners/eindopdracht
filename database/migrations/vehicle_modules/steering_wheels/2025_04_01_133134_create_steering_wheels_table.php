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
        Schema::create('steering_wheels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('specialization')->default('none');
            $table->foreignId('steering_type_id')->constrained('steering_types')->onDelete('cascade');
            $table->bigInteger('time')->comment('Time to assemble the steering wheel in hours');
            $table->decimal('costs', 10, 2);
            $table->string('image')->default('image_not_set.png')->comment('Image path for the steering wheel');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steering_wheels');
    }
};
