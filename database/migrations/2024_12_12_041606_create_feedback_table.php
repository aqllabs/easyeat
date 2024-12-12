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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['bug', 'feature', 'content', 'other']);
            $table->longText('content');
            $table->json('attachments')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);
            $table->string('status')->default('open');
            $table->timestamps();
        });

        Schema::create('feedback_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feedback_id')->constrained()->cascadeOnDelete();
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->enum('vote_type', ['upvote', 'downvote']);
            $table->timestamps();

            // Prevent duplicate votes from same IP for same feedback
            $table->unique(['ip_address', 'feedback_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_votes');
        Schema::dropIfExists('feedback');
    }
};
