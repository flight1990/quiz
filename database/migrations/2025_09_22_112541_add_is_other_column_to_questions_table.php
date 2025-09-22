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

        if (!Schema::hasColumn('questions', 'is_other')) {
            Schema::table('questions', function (Blueprint $table) {
                $table->boolean('is_other')->default(false);
            });
        }

        Schema::table('questions', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('questions', 'is_other')) {
            Schema::table('questions', function (Blueprint $table) {
                $table->dropColumn('is_other');
            });
        }
    }
};
