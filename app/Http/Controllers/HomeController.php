<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Standing;
use App\Models\Game;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Equipo objetivo
        $miEquipo = Team::where('nombre', 'C. D. MURIANENSE')->first();

        // 1. Clasificación
        $standings = Standing::with('team')->orderBy('puntos', 'desc')->get();

        // 2. Determinar la Última Jornada Jugada (para mostrar resultados por defecto)
        $ultimaJornadaJugada = Game::whereNotNull('goles_local')->max('jornada') ?? 1;
        $jornadaMostrada = $request->get('jornada', $ultimaJornadaJugada);

        $games = Game::with(['localTeam', 'visitorTeam'])
            ->where('jornada', $jornadaMostrada)
            ->get();

        // 3. PRÓXIMO PARTIDO (El primero en el tiempo que no se haya jugado y donde juegue tu equipo)
        $proximoPartido = Game::with(['localTeam', 'visitorTeam'])
            ->where(function($q) use ($miEquipo) {
                $q->where('local_team_id', $miEquipo->id)
                  ->orWhere('visitor_team_id', $miEquipo->id);
            })
            ->whereNull('goles_local')
            ->orderBy('fecha_partido', 'asc')
            ->first();

        $noticias = Post::orderBy('fecha_publicacion', 'desc')->take(3)->get();

        $jornadaAnterior = $jornadaMostrada > 1 ? $jornadaMostrada - 1 : null;
        $jornadaSiguiente = Game::max('jornada') > $jornadaMostrada ? $jornadaMostrada + 1 : null;

        return view('inicio', compact(
            'standings', 
            'games', 
            'noticias', 
            'jornadaMostrada', 
            'jornadaAnterior', 
            'jornadaSiguiente', 
            'proximoPartido'
        ));
    }

    public function show(Post $post)
    {
        return view('noticias.show', compact('post'));
    }
}