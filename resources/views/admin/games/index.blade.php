<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Resultados - Admin MURIANENSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900">

    <!-- Header Panel -->
    <header class="bg-[#9F1239] text-white py-4 px-6 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-black italic uppercase tracking-widest">CD Murianense <span class="text-rose-300">Admin</span></h1>
            <nav class="flex gap-4">
                <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase tracking-widest hover:text-rose-200 transition-colors">Dashboard</a>
                <a href="{{ route('posts.index') }}" class="text-xs font-bold uppercase tracking-widest hover:text-rose-200 transition-colors">Noticias</a>
                <a href="{{ route('games.index') }}" class="text-xs font-bold uppercase tracking-widest text-white border-b-2 border-white pb-1">Resultados</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs font-bold uppercase tracking-widest text-rose-300 hover:text-white transition-colors">Salir</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-10 px-6">
        
        <!-- Controles de Jornada -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <h2 class="text-3xl font-black uppercase text-slate-800 tracking-tight">Calendario</h2>
            
            <div class="flex items-center bg-white p-2 rounded-2xl shadow-sm border border-slate-200">
                @if($jornadaAnterior)
                    <a href="{{ route('games.index', ['jornada' => $jornadaAnterior]) }}" class="w-10 h-10 flex items-center justify-center bg-slate-100 hover:bg-[#E11D48] hover:text-white rounded-xl transition-all font-black text-lg">&lt;</a>
                @else
                    <div class="w-10 h-10"></div>
                @endif
                
                <span class="font-black uppercase text-slate-800 px-6 tracking-widest">Jornada {{ $jornadaActual }}</span>
                
                @if($jornadaSiguiente)
                    <a href="{{ route('games.index', ['jornada' => $jornadaSiguiente]) }}" class="w-10 h-10 flex items-center justify-center bg-slate-100 hover:bg-[#E11D48] hover:text-white rounded-xl transition-all font-black text-lg">&gt;</a>
                @else
                    <div class="w-10 h-10"></div>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl mb-6 font-bold shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs tracking-widest font-bold">
                    <tr>
                        <th class="px-6 py-4">Fecha</th>
                        <th class="px-6 py-4 text-right">Local</th>
                        <th class="px-6 py-4 text-center">Resultado</th>
                        <th class="px-6 py-4">Visitante</th>
                        <th class="px-6 py-4 text-center">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($games as $game)
                        <tr class="hover:bg-slate-50 transition-colors {{ $game->goles_local === null ? 'bg-rose-50/30' : '' }}">
                            
                            <!-- Fecha -->
                            <td class="px-6 py-4 font-bold text-slate-400">
                                {{ \Carbon\Carbon::parse($game->fecha_partido)->format('d/m/Y') }}
                            </td>
                            
                            <!-- Local -->
                            <td class="px-6 py-4 text-right font-bold {{ $miEquipo && $game->local_team_id == $miEquipo->id ? 'text-[#E11D48]' : 'text-slate-600' }}">
                                {{ $game->localTeam->nombre }}
                            </td>
                            
                            <!-- Resultado o Formulario -->
                            <td class="px-6 py-4">
                                @if($game->goles_local !== null)
                                    <div class="text-center font-black text-xl text-slate-800 bg-slate-100 py-1 rounded-lg">
                                        {{ $game->goles_local }} - {{ $game->goles_visitante }}
                                    </div>
                                @else
                                    <form action="{{ route('games.update', $game) }}" method="POST" id="form-{{ $game->id }}" class="flex justify-center items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="goles_local" class="w-12 h-10 text-center font-black text-lg border-2 border-slate-200 rounded-lg focus:border-[#E11D48] focus:ring-0" required min="0">
                                        <span class="font-black text-slate-400">-</span>
                                        <input type="number" name="goles_visitante" class="w-12 h-10 text-center font-black text-lg border-2 border-slate-200 rounded-lg focus:border-[#E11D48] focus:ring-0" required min="0">
                                    </form>
                                @endif
                            </td>
                            
                            <!-- Visitante -->
                            <td class="px-6 py-4 font-bold {{ $miEquipo && $game->visitor_team_id == $miEquipo->id ? 'text-[#E11D48]' : 'text-slate-600' }}">
                                {{ $game->visitorTeam->nombre }}
                            </td>
                            
                            <!-- Botón de Acción -->
                            <td class="px-6 py-4 text-center">
                                @if($game->goles_local === null)
                                    <button type="submit" form="form-{{ $game->id }}" class="bg-[#E11D48] hover:bg-[#9F1239] text-white px-4 py-2 rounded-xl font-black text-xs uppercase tracking-widest transition-colors shadow-md">
                                        Guardar
                                    </button>
                                @else
                                    <span class="text-emerald-500 font-black text-xs uppercase tracking-widest">Jugado ✓</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center font-bold text-slate-400 uppercase tracking-widest">
                                No hay partidos en esta jornada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>