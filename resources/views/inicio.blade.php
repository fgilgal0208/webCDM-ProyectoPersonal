<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CD MURIANENSE - Web Oficial</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clubRojo: '#E11D48',
                        clubRojoDeep: '#9F1239',
                        clubRojoLight: '#fb7185',
                        clubNegro: '#0f172a',
                        clubBlanco: '#FFFFFF',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col overflow-x-hidden">

    <header class="bg-gradient-to-br from-clubRojo via-clubRojoDeep to-rose-900 text-white py-12 px-6 text-center border-b-4 border-clubRojo shadow-2xl relative overflow-hidden animate__animated animate__fadeInDown">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="currentColor" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="url(#grid)" />
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
            </svg>
        </div>
        
        <div class="relative z-10">
            <h1 class="text-5xl md:text-8xl font-black italic tracking-tighter drop-shadow-2xl">
                CD <span class="text-white">MURIANENSE</span>
            </h1>
            <p class="mt-2 text-white/90 font-bold tracking-[0.5em] text-xs md:text-base uppercase">
                Orgullo y Pasión • Temporada 2026
            </p>
        </div>
    </header>

    <main class="w-full max-w-[1800px] mx-auto flex-grow p-4 md:p-6 lg:p-10 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
        
        <section class="lg:col-span-8 bg-white p-4 md:p-8 rounded-[2rem] shadow-xl border border-slate-100 animate__animated animate__fadeInLeft">
            <div class="flex items-center mb-8 border-b-2 border-slate-50 pb-4">
                <h2 class="text-3xl font-black uppercase tracking-tight text-slate-800">
                    Clasificación <span class="text-clubRojo">Liga</span>
                </h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-slate-400 uppercase text-[11px] tracking-widest bg-slate-50/50">
                        <tr>
                            <th class="px-2 py-4">Pos</th>
                            <th class="px-4 py-4 text-left">Equipo</th>
                            <th class="px-2 py-4">Pts</th>
                            <th class="px-2 py-4">PJ</th>
                            <th class="px-2 py-4">V</th>
                            <th class="px-2 py-4">E</th>
                            <th class="px-2 py-4">D</th>
                            <th class="px-2 py-4 hidden md:table-cell">GF</th>
                            <th class="px-2 py-4 hidden md:table-cell">GC</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($standings as $teamStat)
                            <tr class="group transition-all hover:bg-rose-50/30">
                                <td class="px-2 py-5 text-center">
                                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-slate-900 text-white font-black group-hover:bg-clubRojo transition-colors shadow-lg">
                                        {{ $teamStat->posicion }}
                                    </span>
                                </td>
                                <td class="px-4 py-5">
                                    <div class="flex items-center gap-4">
                                        @if($teamStat->team->escudo_path)
                                            <img src="{{ asset('storage/' . $teamStat->team->escudo_path) }}" class="w-10 h-10 object-contain">
                                        @else
                                            <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center border border-slate-200">⚽</div>
                                        @endif
                                        <span class="text-base md:text-lg font-bold text-slate-700 group-hover:text-clubRojo transition-colors uppercase tracking-tight">
                                            {{ $teamStat->team->nombre }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-2 py-5 text-center font-black text-2xl text-slate-900">{{ $teamStat->puntos }}</td>
                                <td class="px-2 py-5 text-center font-bold text-slate-500">{{ $teamStat->jugados }}</td>
                                <td class="px-2 py-5 text-center text-emerald-600 font-bold">{{ $teamStat->ganados }}</td>
                                <td class="px-2 py-5 text-center text-amber-500 font-bold">{{ $teamStat->empatados }}</td>
                                <td class="px-2 py-5 text-center text-rose-500 font-bold">{{ $teamStat->perdidos }}</td>
                                <td class="px-2 py-5 text-center text-slate-400 hidden md:table-cell">{{ $teamStat->goles_favor ?? '0' }}</td>
                                <td class="px-2 py-5 text-center text-slate-400 hidden md:table-cell">{{ $teamStat->goles_contra ?? '0' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="9" class="py-20 text-center font-bold text-slate-300">CARGANDO DATOS...</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="lg:col-span-4 flex flex-col gap-6 animate__animated animate__fadeInRight">
            
            <section class="bg-white p-6 rounded-[2rem] shadow-xl border border-slate-100 flex-grow">
                <h2 class="text-2xl font-black uppercase mb-6 flex items-center gap-3">
                    <span class="w-2 h-7 bg-clubRojo rounded-full"></span>
                    Resultados
                </h2>
                <div class="grid gap-4">
                    @forelse($games as $game)
                        <div class="group bg-slate-50 p-5 rounded-3xl border border-slate-100 transition-all hover:bg-white hover:shadow-xl hover:-translate-y-1">
                            <div class="flex justify-between items-center">
                                <div class="w-2/5 flex flex-col items-center">
                                    <span class="text-[11px] font-black uppercase text-slate-400 text-center leading-tight">{{ $game->localTeam->nombre }}</span>
                                </div>

                                <div class="w-1/5 flex flex-col items-center">
                                    <div class="text-3xl font-black italic text-slate-800">
                                        {{ $game->goles_local ?? '0' }}<span class="text-clubRojo text-xl mx-1">:</span>{{ $game->goles_visitante ?? '0' }}
                                    </div>
                                    <span class="text-[8px] font-black bg-slate-900 text-white px-2 py-0.5 rounded-full mt-1">FINAL</span>
                                </div>

                                <div class="w-2/5 flex flex-col items-center">
                                    <span class="text-[11px] font-black uppercase text-slate-400 text-center leading-tight">{{ $game->visitorTeam->nombre }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 text-slate-300 font-black">SIN PARTIDOS</div>
                    @endforelse
                </div>
            </section>

            <section class="bg-gradient-to-br from-clubRojo to-clubRojoDeep p-6 rounded-[2rem] shadow-2xl text-white">
                <h2 class="text-xl font-black uppercase mb-6 flex items-center justify-between">
                    Estadísticas
                    <span class="bg-white/20 p-2 rounded-lg">📊</span>
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between bg-white/10 p-4 rounded-2xl backdrop-blur-sm">
                        <span class="text-xs font-bold uppercase">Goleador</span>
                        <span class="font-black italic">PRÓXIMAMENTE</span>
                    </div>
                    <div class="flex items-center justify-between bg-white/10 p-4 rounded-2xl backdrop-blur-sm">
                        <span class="text-xs font-bold uppercase">Zamora</span>
                        <span class="font-black italic">PRÓXIMAMENTE</span>
                    </div>
                </div>
            </section>

        </aside>

    </main>

    <footer class="bg-gradient-to-r from-clubNegro to-slate-900 text-white/50 py-12 px-6 mt-10 border-t-4 border-clubRojo">
        <div class="max-w-[1800px] mx-auto flex flex-col md:row justify-between items-center gap-6">
            <span class="text-3xl font-black italic tracking-tighter text-white/20">CD MURIANENSE</span>
            <div class="text-center">
                <p class="text-xs font-bold uppercase tracking-widest text-white/80">&copy; {{ date('Y') }} • Web Oficial</p>
                <div class="flex justify-center gap-4 mt-4">
                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center hover:bg-clubRojo hover:text-white transition-all cursor-pointer">𝕏</div>
                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center hover:bg-clubRojo hover:text-white transition-all cursor-pointer">IG</div>
                </div>
            </div>
            <button class="text-[10px] font-black uppercase border border-white/10 px-6 py-2 rounded-full hover:bg-white hover:text-clubNegro transition-all">
                Panel Privado
            </button>
        </div>
    </footer>

</body>
</html>