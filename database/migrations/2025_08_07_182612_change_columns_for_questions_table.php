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
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('is_multiple');

            $table->enum('answer_type', ['text', 'radio', 'checkbox'])
                ->nullable()
                ->default('radio')
                ->after('order');

            $table->smallInteger('answer_timer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->boolean('is_multiple')->nullable()->default(0);

            $table->dropColumn('answer_type');
            $table->dropColumn('answer_timer');
        });
    }
};
