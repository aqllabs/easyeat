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
        // Create product types table
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Create dietary requirements table
        Schema::create('dietary_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Create products table
        Schema::create('food_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('website')->nullable();
            $table->foreignId('venue_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('is_halal')->default(false);
            $table->boolean('no_alcohol')->default(false);
            $table->json('shop_info')->nullable();
            $table->timestamps();
        });

        // Create pivot table for product types and products
        Schema::create('food_product_product_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_product_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_type_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['food_product_id', 'product_type_id'], 'food_product_type_unique');
        });

        // Create pivot table for dietary requirements and products
        Schema::create('dietary_requirement_food_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_product_id')->constrained()->onDelete('cascade');
            $table->foreignId('dietary_requirement_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['food_product_id', 'dietary_requirement_id'], 'food_product_diet_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dietary_requirement_food_product');
        Schema::dropIfExists('food_product_product_type');
        Schema::dropIfExists('food_products');
        Schema::dropIfExists('dietary_requirements');
        Schema::dropIfExists('product_types');
    }
}; 