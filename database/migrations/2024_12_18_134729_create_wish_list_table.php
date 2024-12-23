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
        Schema::create('wish_list', function (Blueprint $table) {
            $table->id('wishlist_id'); // Define 'wishlist_id' as the primary key
            $table->foreignId('user_id') // 'user_id' as a foreign key
                  ->constrained() // Defaults to 'users' table
                  ->onDelete('cascade'); // Cascade delete when a user is deleted
            $table->foreignId('item_id') // 'item_id' as a foreign key
                  ->constrained('items') // Reference the 'items' table
                  ->onDelete('cascade'); // Cascade delete when an item is deleted
            $table->enum('state', [0,1])->default(0); // State field for wished/not wished
            $table->timestamps(); // Default timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_list');
    }
};
