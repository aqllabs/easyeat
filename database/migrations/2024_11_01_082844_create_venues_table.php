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


        Schema::create('venue_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->timestamps();
        });

        Schema::create('cuisines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->timestamps();
        });

        Schema::create('cuisine_venue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_id')->constrained()->onDelete('cascade');
            $table->foreignId('cuisine_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['venue_id', 'cuisine_id']);
        });

        Schema::create('diet_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->timestamps();
        });

        Schema::create('diet_category_venue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_id')->constrained()->onDelete('cascade');
            $table->foreignId('diet_category_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['venue_id', 'diet_category_id']);
        });

        Schema::create('halal_assurances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->timestamps();
        });

        Schema::create('price_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();  // e.g., 'inexpensive', 'moderate', 'expensive', 'very_expensive'
            $table->string('symbol')->nullable();          // e.g., '$', '$$', '$$$', '$$$$'
            $table->integer('min_price')->nullable();      // e.g., 0, 30, 60, 100
            $table->integer('max_price')->nullable();      // e.g., 30, 60, 100, null
            $table->string('display_name')->nullable();    // e.g., 'Under $30', '$30-$60', etc.
            $table->timestamps();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->timestamps();
        });

        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('city');
            $table->string('address');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->string('google_maps_url');
            $table->json('images')->nullable();
            $table->json('remarks')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('telephone')->nullable();
            $table->text('description')->nullable();
            $table->json('opening_hours')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->date('halal_assurance_expiry_date')->nullable();
            $table->foreignId('area_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('price_range_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('venue_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('halal_assurance_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_category_venue');
        Schema::dropIfExists('diet_categories');
        Schema::dropIfExists('cuisine_venue');
        Schema::dropIfExists('cuisines');
        Schema::dropIfExists('venues');
        Schema::dropIfExists('halal_assurances');
        Schema::dropIfExists('price_ranges');
        Schema::dropIfExists('venue_types');
        Schema::dropIfExists('areas');
    }
};
