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
        Schema::create('drives', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name')->unique();
            $table->foreignId('drive_type_id')->constrained('drive_types')->onDelete('cascade');
            $table->bigInteger('power')->comment('pk');
            $table->bigInteger('time')->comment('Time to assemble the drive in hours');
            $table->decimal('costs', 10, 2);
            $table->string('image')->default('image_not_set.png')->comment('Image path for the drive');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drives');
    }
};
