<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $miEquipo = Team::where('nombre', 'C. D. MURIANENSE')->first();


        $jornadaPendiente = Game::whereNull('goles_local')->orderByRaw('CAST(jornada AS UNSIGNED) ASC')->value('jornada') ?? 1;
        

        $jornadaActual = $request->get('jornada', $jornadaPendiente);

        $games = Game::with(['localTeam', 'visitorTeam'])
            ->where('jornada', $jornadaActual)
            ->get();


        $jornadaAnterior = $jornadaActual > 1 ? $jornadaActual - 1 : null;
        

        $haySiguiente = Game::where('jornada', (string)($jornadaActual + 1))->exists();
        $jornadaSiguiente = $haySiguiente ? $jornadaActual + 1 : null;

        return view('admin.games.index', compact('games', 'miEquipo', 'jornadaActual', 'jornadaAnterior', 'jornadaSiguiente'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'goles_local' => 'required|integer|min:0',
            'goles_visitante' => 'required|integer|min:0',
        ]);

        $game->update([
            'goles_local' => $request->goles_local,
            'goles_visitante' => $request->goles_visitante,
        ]);

        // Redirigimos de vuelta a la MISMA jornada que estábamos editando
        return redirect()->route('games.index', ['jornada' => $game->jornada])
            ->with('success', 'Resultado guardado correctamente.');
    }
}