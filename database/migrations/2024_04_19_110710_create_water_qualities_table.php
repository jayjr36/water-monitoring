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
        Schema::create('water_qualities', function (Blueprint $table) {
            $table->id();
            $table->string('device_no');
            $table->decimal('ph', 5, 2)->nullable();
            $table->decimal('ammonia', 8, 2)->nullable();
            $table->decimal('turbidity', 8, 2)->nullable();
            $table->decimal('temperature', 8, 2)->nullable();
            $table->string('notification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_qualities');
    }
};
