<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Standing;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Traemos la clasificación
        $standings = Standing::with('team')
                             ->orderBy('puntos', 'desc')
                             ->orderByRaw('(goles_favor - goles_contra) desc')
                             ->get();

        // 2. Extraemos TODAS las jornadas y las convertimos a números reales matemáticos
        // Así evitamos el error de que el texto "9" sea mayor que el texto "24"
        $todasLasJornadas = Game::pluck('numero_jornada')
                                ->map(function ($j) { return (int) $j; })
                                ->unique()
                                ->sort()
                                ->values();

        // 3. Buscamos la máxima de verdad
        $jornadaMaxima = $todasLasJornadas->max() ?? 1;

        // 4. ¿Qué jornada mostramos? (La que pida la flecha o la máxima por defecto)
        $jornadaMostrada = (int) $request->input('jornada', $jornadaMaxima);

        // 5. Traemos los partidos de esa jornada (lo pasamos a texto de nuevo por si acaso para la BD)
        $games = Game::with(['localTeam', 'visitorTeam'])
                     ->where('numero_jornada', (string)$jornadaMostrada)
                     ->get();

        // 6. Calculamos las flechas de navegación buscando en nuestra lista ordenada de números
        $indiceActual = $todasLasJornadas->search($jornadaMostrada);
        
        $jornadaAnterior = null;
        $jornadaSiguiente = null;

        if ($indiceActual !== false) {
            if ($indiceActual > 0) {
                $jornadaAnterior = $todasLasJornadas[$indiceActual - 1];
            }
            if ($indiceActual < $todasLasJornadas->count() - 1) {
                $jornadaSiguiente = $todasLasJornadas[$indiceActual + 1];
            }
        }

        return view('inicio', compact('games', 'standings', 'jornadaMostrada', 'jornadaAnterior', 'jornadaSiguiente'));
    }
}