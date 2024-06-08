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
        Schema::create('botc_jinxes', function (Blueprint $table) {
            $table->string("role_id");
            $table->string("jinx_with");
            $table->text("jinx");
            $table->timestamps();
            $table->primary(["role_id", "jinx_with"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('botc_jinxes');
    }
};
