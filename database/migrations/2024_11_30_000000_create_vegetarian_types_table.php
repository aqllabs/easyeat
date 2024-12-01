<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vegetarian_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('display_name');
            $table->timestamps();
        });

        // Add vegetarian_type_id to venues table
        Schema::table('venues', function (Blueprint $table) {
            $table->foreignId('vegetarian_type_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->dropConstrainedForeignId('vegetarian_type_id');
        });
        Schema::dropIfExists('vegetarian_types');
    }
};
