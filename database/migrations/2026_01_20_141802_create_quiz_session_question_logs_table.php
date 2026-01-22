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
        Schema::create('quiz_session_question_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_session_id')
                ->constrained('quiz_sessions')
                ->cascadeOnDelete();
            $table->foreignId('question_id')
                ->constrained('questions')
                ->cascadeOnDelete();
            $table->enum('status', ['started', 'skipped', 'timeout', 'finished', 'canceled', 'failed'])
                ->default('started');
            $table->timestamp('datetime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_session_question_logs');
    }
};
