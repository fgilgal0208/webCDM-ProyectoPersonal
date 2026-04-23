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

    <header class="bg-clubRojoDeep text-white py-6 px-4 md:px-8 border-b-8 border-clubRojo shadow-xl relative z-20">
        <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            
            <div class="flex flex-col md:flex-row items-center gap-5 md:gap-6">
                <div class="bg-white p-3 md:p-4 rounded-2xl shadow-2xl transform md:-rotate-3 hover:rotate-0 transition-transform duration-300">
                    <img src="{{ asset('storage/escudos/murianense.jpg') }}" alt="Escudo CD Murianense" class="w-16 h-16 md:w-20 md:h-20 object-contain">
                </div>
                
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter drop-shadow-md">
                        CD MURIANENSE
                    </h1>
                    <div class="flex items-center justify-center md:justify-start gap-3 mt-1">
                        <span class="w-8 h-1 bg-white/30 rounded-full"></span>
                        <p class="text-rose-200 font-bold tracking-[0.3em] text-[10px] md:text-xs uppercase">
                            Web Oficial del Club
                        </p>
                        <span class="w-8 h-1 bg-white/30 rounded-full"></span>
                    </div>
                </div>
            </div>
            
            <div class="hidden lg:flex flex-col items-end">
                <span class="text-xs font-bold uppercase tracking-widest text-white/50">Temporada</span>
                <span class="text-2xl font-black text-white drop-shadow-md">2025/2026</span>
            </div>
            
        </div>
    </header>

    <section class="w-full max-w-[1600px] mx-auto px-4 md:px-6 pt-6 animate__animated animate__fadeIn">
        <div class="relative w-full h-[250px] md:h-[400px] rounded-[2rem] overflow-hidden shadow-2xl group border-4 border-white">
            
            <div id="slider" class="flex w-full h-full transition-transform duration-700 ease-in-out">
                
                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="{{ asset('storage/carrusel/foto2.jpg') }}"  class="w-full h-full object-cover" alt="Equipo + aficion">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-10 w-full">
                        <h3 class="text-white text-2xl md:text-4xl font-black italic drop-shadow-lg uppercase">La fuerza de un pueblo</h3>
                        <p class="text-clubRojoLight font-bold tracking-widest text-[10px] md:text-sm mt-2 uppercase">Juntos somos imparables</p>
                    </div>
                </div>

                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="{{ asset('storage/carrusel/foto1.jpg') }}" class="w-full h-full object-cover" alt="Equipo">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-10 w-full">
                        <h3 class="text-white text-2xl md:text-4xl font-black italic drop-shadow-lg uppercase">Nuestra Fortaleza</h3>
                        <p class="text-clubRojoLight font-bold tracking-widest text-[10px] md:text-sm mt-2 uppercase">Defendiendo nuestros colores</p>
                    </div>
                </div>

                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="{{ asset('storage/carrusel/foto3.jpg') }}"  class="w-full h-full object-cover" alt="Afición">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-10 w-full">
                        <h3 class="text-white text-2xl md:text-4xl font-black italic drop-shadow-lg uppercase">Alma Murianense</h3>
                        <p class="text-clubRojoLight font-bold tracking-widest text-[10px] md:text-sm mt-2 uppercase">La mejor afición de la liga</p>
                    </div>
                </div>

            </div>

            <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-clubRojo text-white w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 shadow-lg font-black">&lt;</button>
            <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-clubRojo text-white w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 shadow-lg font-black">&gt;</button>

            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-3">
                <button onclick="goToSlide(0)" class="dot w-3 h-3 md:w-4 md:h-2 rounded-full bg-clubRojo transition-all duration-300"></button>
                <button onclick="goToSlide(1)" class="dot w-3 h-3 md:w-4 md:h-2 rounded-full bg-white/50 hover:bg-white transition-all duration-300"></button>
                <button onclick="goToSlide(2)" class="dot w-3 h-3 md:w-4 md:h-2 rounded-full bg-white/50 hover:bg-white transition-all duration-300"></button>
            </div>
        </div>
    </section>

    <main class="w-full max-w-[1600px] mx-auto flex-grow p-4 md:p-6 grid grid-cols-1 lg:grid-cols-12 gap-4 lg:gap-6">
        
        <section class="lg:col-span-8 bg-white p-4 md:p-6 rounded-3xl shadow-lg border border-slate-100 animate__animated animate__fadeInUp">
            <div class="flex items-center mb-4 border-b-2 border-rose-50 pb-3">
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-800 flex items-center gap-3">
                    <span class="w-2 h-6 bg-gradient-to-b from-clubRojo to-clubRojoDeep rounded-full"></span>
                    Clasificación
                </h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-xs md:text-sm">
                    <thead class="text-slate-400 uppercase text-[10px] tracking-widest bg-slate-50/80">
                        <tr>
                            <th class="px-2 py-3 font-bold">Pos</th>
                            <th class="px-2 py-3 text-left">Equipo</th>
                            <th class="px-1 py-3">Pts</th>
                            <th class="px-1 py-3">PJ</th>
                            <th class="px-1 py-3">V</th>
                            <th class="px-1 py-3">E</th>
                            <th class="px-1 py-3">D</th>
                            <th class="px-1 py-3 hidden md:table-cell">GF</th>
                            <th class="px-1 py-3 hidden md:table-cell">GC</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($standings as $teamStat)
                            <tr class="group transition-all hover:bg-rose-50/50">
                                <td class="px-2 py-2 text-center">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg bg-slate-900 text-white font-bold group-hover:bg-clubRojo transition-colors shadow-sm">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="px-2 py-2">
                                    <div class="flex items-center gap-3">
                                        @if($teamStat->team->escudo_path)
                                            <img src="{{ asset('storage/' . $teamStat->team->escudo_path) }}" class="w-8 h-8 object-contain drop-shadow-sm group-hover:scale-110 transition-transform">
                                        @else
                                            <div class="w-8 h-8 bg-slate-100 rounded-full flex items-center justify-center border border-slate-200 text-xs">⚽</div>
                                        @endif
                                        <span class="font-bold text-slate-700 group-hover:text-clubRojo transition-colors uppercase tracking-tight text-[11px] md:text-sm">
                                            {{ $teamStat->team->nombre }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-1 py-2 text-center font-black text-lg md:text-xl text-slate-900">{{ $teamStat->puntos }}</td>
                                <td class="px-1 py-2 text-center font-bold text-slate-500">{{ $teamStat->jugados }}</td>
                                <td class="px-1 py-2 text-center text-emerald-600 font-bold">{{ $teamStat->ganados }}</td>
                                <td class="px-1 py-2 text-center text-amber-500 font-bold">{{ $teamStat->empatados }}</td>
                                <td class="px-1 py-2 text-center text-rose-500 font-bold">{{ $teamStat->perdidos }}</td>
                                <td class="px-1 py-2 text-center text-slate-400 hidden md:table-cell">{{ $teamStat->goles_favor }}</td>
                                <td class="px-1 py-2 text-center text-slate-400 hidden md:table-cell">{{ $teamStat->goles_contra }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="9" class="py-10 text-center font-bold text-slate-300 italic uppercase">Esperando datos...</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="lg:col-span-4 flex flex-col animate__animated animate__fadeInUp">
            <section class="bg-white p-4 md:p-6 rounded-3xl shadow-lg border border-slate-100 h-full">
                
                <div class="flex items-center justify-between mb-4 pb-3 border-b-2 border-slate-50">
                    <h2 class="text-xl md:text-2xl font-black uppercase flex items-center gap-2">
                        <span class="w-2 h-6 bg-clubRojo rounded-full"></span>
                        Jornada {{ $jornadaMostrada }}
                    </h2>
                    
                    <div class="flex gap-2">
                        @if($jornadaAnterior)
                            <a href="?jornada={{ $jornadaAnterior }}" class="w-8 h-8 md:w-9 md:h-9 bg-slate-100 hover:bg-clubRojo hover:text-white rounded-full flex items-center justify-center transition-colors font-black shadow-sm border border-slate-200">&lt;</a>
                        @else
                            <div class="w-8 h-8 md:w-9 md:h-9 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center font-black border border-slate-100 cursor-not-allowed">&lt;</div>
                        @endif

                        @if($jornadaSiguiente)
                            <a href="?jornada={{ $jornadaSiguiente }}" class="w-8 h-8 md:w-9 md:h-9 bg-slate-100 hover:bg-clubRojo hover:text-white rounded-full flex items-center justify-center transition-colors font-black shadow-sm border border-slate-200">&gt;</a>
                        @else
                            <div class="w-8 h-8 md:w-9 md:h-9 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center font-black border border-slate-100 cursor-not-allowed">&gt;</div>
                        @endif
                    </div>
                </div>

                <div class="grid gap-3">
                    @forelse($games as $game)
                        <div class="group bg-slate-50 p-3 md:p-4 rounded-2xl border border-slate-100 transition-all hover:bg-white hover:shadow-md hover:-translate-y-0.5">
                            <div class="flex justify-between items-center">
                                <div class="w-5/12 flex flex-col items-center gap-2">
                                    @if($game->localTeam->escudo_path)
                                        <img src="{{ asset('storage/' . $game->localTeam->escudo_path) }}" class="w-9 h-9 md:w-11 md:h-11 object-contain drop-shadow-md group-hover:scale-110 transition-transform">
                                    @else
                                        <div class="w-9 h-9 md:w-11 md:h-11 bg-white rounded-full flex items-center justify-center border border-slate-200 shadow-sm">🏠</div>
                                    @endif
                                    <span class="text-[9px] md:text-[10px] font-black uppercase text-slate-500 text-center leading-tight group-hover:text-clubRojo truncate w-full">{{ $game->localTeam->nombre }}</span>
                                </div>

                                <div class="w-2/12 flex flex-col items-center justify-center">
                                    <div class="text-xl md:text-2xl font-black italic text-slate-800 tracking-tighter whitespace-nowrap">
                                        {{ $game->goles_local }}<span class="text-clubRojo mx-0.5">-</span>{{ $game->goles_visitante }}
                                    </div>
                                    <span class="text-[7px] font-black bg-slate-900 text-white px-2 py-0.5 rounded-full mt-1 uppercase shadow-sm">FIN</span>
                                </div>

                                <div class="w-5/12 flex flex-col items-center gap-2">
                                    @if($game->visitorTeam->escudo_path)
                                        <img src="{{ asset('storage/' . $game->visitorTeam->escudo_path) }}" class="w-9 h-9 md:w-11 md:h-11 object-contain drop-shadow-md group-hover:scale-110 transition-transform">
                                    @else
                                        <div class="w-9 h-9 md:w-11 md:h-11 bg-white rounded-full flex items-center justify-center border border-slate-200 shadow-sm">🚌</div>
                                    @endif
                                    <span class="text-[9px] md:text-[10px] font-black uppercase text-slate-500 text-center leading-tight group-hover:text-clubRojo truncate w-full">{{ $game->visitorTeam->nombre }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 text-slate-300 font-bold italic text-sm uppercase border-2 border-dashed border-slate-100 rounded-2xl">Sin partidos</div>
                    @endforelse
                </div>
            </section>
        </aside>

    </main>

    <footer class="bg-clubNegro text-white/50 py-6 px-4 mt-auto border-t-4 border-clubRojo">
        <div class="max-w-[1600px] mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <span class="text-xl font-black italic tracking-tighter text-white">CD MURIANENSE</span>
                <span class="text-[9px] font-bold tracking-widest uppercase text-white/30 hidden md:block">| Temporada 2026</span>
            </div>
            
            <button class="bg-white/10 hover:bg-clubRojo text-white px-6 py-2 rounded-full font-black text-[10px] uppercase tracking-widest transition-all">
                Panel Admin
            </button>
        </div>
    </footer>

    <script>
        let currentSlide = 0;
        const totalSlides = 3;
        const slider = document.getElementById('slider');
        const dots = document.querySelectorAll('.dot');

        function updateSlider() {
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.remove('bg-white/50');
                    dot.classList.add('bg-clubRojo');
                } else {
                    dot.classList.remove('bg-clubRojo');
                    dot.classList.add('bg-white/50');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
        }

        // Cambio automático cada 5 segundos
        setInterval(nextSlide, 5000);
    </script>
</body>
</html>