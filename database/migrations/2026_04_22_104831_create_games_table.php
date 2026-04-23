<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('jornada'); // Corregido de 'numero_jornada' a 'jornada'
            $table->foreignId('local_team_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('visitor_team_id')->constrained('teams')->onDelete('cascade');
            $table->integer('goles_local')->nullable();
            $table->integer('goles_visitante')->nullable();
            $table->date('fecha_partido')->nullable(); // Corregido de 'fecha_hora' a 'fecha_partido'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};