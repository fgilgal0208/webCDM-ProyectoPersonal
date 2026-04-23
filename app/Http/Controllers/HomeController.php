<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Standing;
use App\Models\Post; // <-- IMPORTANTE: Añade esta línea
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $jornadaMostrada = $request->query('jornada', 1);

        $standings = Standing::with('team')->orderBy('puntos', 'desc')->get();
        
        $games = Game::with(['localTeam', 'visitorTeam'])
            ->where('jornada', $jornadaMostrada)
            ->get();

        // BUSCAMOS LAS 3 ÚLTIMAS NOTICIAS
        $noticias = Post::orderBy('fecha_publicacion', 'desc')->take(3)->get();

        $jornadaAnterior = $jornadaMostrada > 1 ? $jornadaMostrada - 1 : null;
        $jornadaSiguiente = $jornadaMostrada < 30 ? $jornadaMostrada + 1 : null;

        // PASAMOS 'noticias' A LA VISTA
        return view('inicio', compact(
            'standings', 
            'games', 
            'jornadaMostrada', 
            'jornadaAnterior', 
            'jornadaSiguiente',
            'noticias' // <-- AÑADIMOS ESTO
        ));
    }
}