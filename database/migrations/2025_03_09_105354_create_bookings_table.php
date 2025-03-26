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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number',200);
            $table->string('check_in');
            $table->string('check_out');
            $table->integer('days');
            $table->integer('price');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('room_name')->constrained('apartments')->cascadeOnDelete();
            $table->foreignId('hotel_name')->constrained('hotels')->cascadeOnDelete();
            $table->string('status')->default('Processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
