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
        Schema::create('botc_roles', function (Blueprint $table) {
            $table->string("id", length: 150)->primary();
            $table->string("name", length: 200);
            $table->string("ability", length: 500)->nullable();
            $table->integer("firstNight")->nullable();
            $table->text("firstNightReminder")->nullable();
            $table->integer("otherNight")->nullable();
            $table->text("otherNightReminder")->nullable();
            $table->enum("team",["townsfolk","outsider","minion","demon","traveler","fabled","_meta"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('botc_roles');
    }
};
