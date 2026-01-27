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
        if (!Schema::hasColumn('answers', 'quiz_session_id')) {
            Schema::table('answers', function (Blueprint $table) {
                $table->foreignId('quiz_session_id')
                    ->nullable()
                    ->after('guest_user_id')
                    ->constrained('quiz_sessions')
                    ->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('answers', 'quiz_session_id')) {
            Schema::table('answers', function (Blueprint $table) {
                $table->dropColumn('quiz_session_id');
            });
        }
    }
};
