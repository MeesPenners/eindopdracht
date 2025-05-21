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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status')->unique();
        });

        Schema::create('robots', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->foreignId('chassis_id')->constrained('chassis')->onDelete('cascade');
            $table->foreignId('drive_id')->constrained('drives')->onDelete('cascade');
            $table->foreignId('wheel_id')->constrained('wheels')->onDelete('cascade');
            $table->foreignId('steering_wheel_id')->constrained('steering_wheels')->onDelete('cascade');
            $table->foreignId('seat_id')->nullable()->constrained('seats')->onDelete('cascade');
            $table->bigInteger('seat_amount')->unsigned()->nullable();
            $table->decimal('total_cost', 10, 2);
            $table->bigInteger('total_time')->comment('Time to assemble the vehicle in hours');
            $table->foreignId('status_id')->default('1')->constrained('statuses')->onDelete('cascade');
            $table->foreignId('robot_id')->constrained('robots')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('robots');
        Schema::dropIfExists('vehicles');
    }
};
