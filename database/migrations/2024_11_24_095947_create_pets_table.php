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
        Schema::create('pets', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key referencing users.id
            $table->string('pet_name'); // Name of the pet
            $table->enum('pet_type', ['cat', 'dog']); // Pet type (cat or dog)
            $table->string('pet_breed')->nullable(); // Breed of the pet
            $table->integer('pet_age')->nullable(); // Age of the pet
            $table->integer('pet_weight')->nullable(); // Weight of the pet
            $table->enum('pet_gender', ['male', 'female']); // Gender of the pet
            $table->string('pet_image')->nullable(); // Pet's image file path
            $table->text('pet_medical_history')->nullable(); // Medical history of the pet
            $table->boolean('is_deleted')->default(0);
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
