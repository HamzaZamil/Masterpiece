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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories
            $table->enum('item_type', ['Cat', 'Dog', 'Fish', 'Bird']);
            $table->string('item_name');
            $table->text('item_description');
            $table->decimal('item_price', 8, 2); // Assuming a max of 999,999.99 for item price
            $table->integer('item_stock');
            $table->string('item_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
