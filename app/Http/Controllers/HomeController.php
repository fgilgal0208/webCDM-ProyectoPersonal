<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Standing;

class HomeController extends Controller
{
    public function index()
    {
        // Traemos los partidos ordenados por fecha y cargamos los equipos (N+1 resuelto)
        $games = Game::with(['localTeam', 'visitorTeam'])
                     ->orderBy('fecha_hora', 'desc')
                     ->get();

        // Traemos la clasificación ordenada por posición
        $standings = Standing::with('team')
                             ->orderBy('posicion', 'asc')
                             ->get();

        // Le enviamos estos datos a la vista 'inicio'
        return view('inicio', compact('games', 'standings'));
    }
}