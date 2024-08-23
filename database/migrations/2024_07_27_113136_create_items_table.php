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
            $table->string('title');
            $table->enum('condition', ['mint', 'near mint', 'very good', 'good', 'fair', 'poor']);
            $table->string('description');
            $table->enum('availability', ['ready to collect', 'en route to trade center']);
            $table->enum('category', ['clothing', 'electronics', 'furniture', 'entertainment', 'other']);
            // The integer method creates an INTEGER equivalent column:
            $table->string('item_image')->nullable();
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
