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
        Schema::table('botc_jinxes', function (Blueprint $table) {
            $table->dropPrimary(["role_id", "jinx_with"]);
        });

        Schema::table('botc_jinxes_history', function (Blueprint $table) {
            $table->dropPrimary(["role_id", "jinx_with","since"]);
        });

        Schema::table('botc_jinxes', function (Blueprint $table) {
            $table->id()->first();
        });

        Schema::table('botc_jinxes_history', function (Blueprint $table) {
            $table->id()->first();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('botc_jinxes', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        Schema::table('botc_jinxes_history', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        Schema::table('botc_jinxes', function (Blueprint $table) {
            $table->primary(["role_id", "jinx_with"]);
        });

        Schema::table('botc_jinxes_history', function (Blueprint $table) {
            $table->primary(["role_id", "jinx_with","since"]);
        });
    }
};
