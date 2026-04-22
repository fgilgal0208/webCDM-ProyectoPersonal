<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Game;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creamos tu equipo (Añade el nombre real si quieres)
        $miEquipo = Team::create([
            'nombre' => 'CD Murianense', 
            'es_mi_equipo' => true,
            'escudo_path' => 'escudos/murianense.png' // Luego subiremos esta imagen
        ]);

        // 2. Creamos un equipo rival
        $rival = Team::create([
            'nombre' => 'CD La Descarga', 
            'es_mi_equipo' => false,
            'escudo_path' => 'escudos/ladescarga.png'
        ]);

        // 3. Creamos un partido de prueba que ya se ha jugado
        Game::create([
            'local_team_id' => $miEquipo->id,
            'visitor_team_id' => $rival->id,
            'goles_local' => 2,
            'goles_visitante' => 1,
            'fecha_hora' => Carbon::now()->subDays(5), // Se jugó hace 5 días
            'numero_jornada' => 'Jornada 25'
        ]);
    }
}