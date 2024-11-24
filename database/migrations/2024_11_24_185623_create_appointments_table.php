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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id'); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign Key to Users table
            $table->unsignedBigInteger('service_id'); // Foreign Key to Services table
            $table->unsignedBigInteger('pet_id'); // Foreign Key to Pets table
            $table->date('appointment_date'); // Appointment Date
            $table->time('appointment_time'); // Appointment Time
            $table->enum('appointment_location', ['van', 'home']); // Location
            $table->enum('appointment_status', ['accepted', 'pending', 'declined', 'done', 'in_progress']); // Status
            $table->timestamps(); // Created_at and Updated_at

            // Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
