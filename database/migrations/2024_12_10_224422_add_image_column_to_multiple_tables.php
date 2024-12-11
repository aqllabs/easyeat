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
        Schema::table('diet_categories', function (Blueprint $table) {
            $table->string('image')->nullable();
        });

        Schema::table('cuisines', function (Blueprint $table) {
            $table->string('image')->nullable();
        });

        Schema::table('areas', function (Blueprint $table) {
            $table->string('image')->nullable();
        });

        Schema::table('venue_types', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diet_categories', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        Schema::table('cuisines', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        Schema::table('areas', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        Schema::table('venue_types', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
