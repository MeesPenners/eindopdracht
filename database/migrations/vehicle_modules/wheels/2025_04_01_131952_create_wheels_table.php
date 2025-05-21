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
        Schema::create('wheels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('wheel_type_id')->nullable()->constrained('wheel_types')->onDelete('cascade');
            $table->bigInteger('diameter')->comment('Diameter in inches');
            $table->bigInteger('time')->comment('Time to assemble the wheels in hours');
            $table->decimal('costs', 10, 2);
            $table->string('image')->default('image_not_set.png')->comment('Image path for the wheel');
            $table->softDeletes();
        });
    }

    /**S
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wheels');
    }
};
