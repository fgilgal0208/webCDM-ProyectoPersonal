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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('local_team_id')->constrained('teams');
            $table->foreignId('visitor_team_id')->constrained('teams');
            $table->integer('goles_local')->nullable();
            $table->integer('goles_visitante')->nullable();
            $table->dateTime('fecha_hora');
            $table->string('numero_jornada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
