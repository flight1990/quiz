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
        Schema::table('answer_option', function (Blueprint $table) {
            if (Schema::hasColumn('answer_option', 'answer_id')) {
                $table->dropForeign(['answer_id']);
                $table->foreign('answer_id')
                    ->references('id')
                    ->on('answers')
                    ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answer_option', function (Blueprint $table) {
            if (Schema::hasColumn('answer_option', 'answer_id')) {
                $table->dropForeign(['answer_id']);
                $table->foreign('answer_id')
                    ->references('id')
                    ->on('answers');
            }
        });
    }
};
