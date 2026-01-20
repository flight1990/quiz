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
        Schema::create('quiz_session_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_session_id')
                ->constrained('quiz_sessions')
                ->cascadeOnDelete();
            $table->foreignId('guest_user_id')
                ->constrained('guest_users')
                ->cascadeOnDelete();
            $table->timestamp('joined_at')->nullable();
            $table->timestamp('left_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_session_participants');
    }
};
