<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->string('google_maps_url')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->string('google_maps_url')->nullable(false)->change();
        });
    }
};
