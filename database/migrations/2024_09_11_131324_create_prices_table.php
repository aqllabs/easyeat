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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_id')->unique();
            $table->string('product_id');
            $table->boolean('active')->default(true);
            $table->string('currency');
            $table->string('type');
            $table->string('billing_scheme');
            $table->string('tiers_mode')->nullable();
            $table->json('metadata')->nullable();
            $table->string('interval')->nullable();
            $table->integer('interval_count')->nullable();
            $table->integer('trial_period_days')->nullable();
            $table->string('usage_type')->nullable();
            $table->integer('unit_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
