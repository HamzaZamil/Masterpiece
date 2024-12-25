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
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id('wishlist_id'); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign Key
            $table->unsignedBigInteger('item_id'); // Foreign Key
            $table->enum('state', ['in_wishlist', 'not_in_wishlist']); // Enum column for state
            $table->timestamps(); // Created_at and updated_at

            // Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }
};
