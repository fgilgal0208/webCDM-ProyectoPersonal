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
    <style>
        #slider { transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1); }
        .custom-scroll::-webkit-scrollbar { width: 5px; }
        .custom-scroll::-webkit-scrollbar-track { background: #f1f1f1; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #E11D48; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col overflow-x-hidden">

    <header class="relative bg-clubRojoDeep text-white pt-10 pb-10 px-6 border-b-8 border-clubNegro shadow-xl z-30 animate__animated animate__fadeInDown">
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <div class="absolute inset-0 bg-gradient-to-r from-clubNegro/40 via-transparent to-clubNegro/40"></div>
            <div class="absolute inset-y-0 left-0 w-1/3 opacity-15" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 20px 20px; mask-image: linear-gradient(to right, black, transparent);"></div>
            <div class="absolute inset-y-0 right-0 w-1/3 opacity-15" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 20px 20px; mask-image: linear-gradient(to left, black, transparent);"></div>
        </div>
        
        <div class="max-w-[1700px] mx-auto flex justify-center relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
                <div class="relative -mb-24 md:-mb-32 bg-white p-4 md:p-5 rounded-[2rem] md:rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.5)] z-40 border-4 border-slate-50 transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('storage/escudos/murianense.jpg') }}" alt="Escudo" class="w-28 h-28 md:w-40 md:h-40 object-contain">
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-5xl md:text-[5.5rem] leading-none font-black italic tracking-tighter uppercase drop-shadow-[0_5px_15px_rgba(0,0,0,0.5)]">
                        CD <span class="text-white">MURIANENSE</span>
                    </h1>
                    <p class="text-rose-200 font-bold tracking-[0.4em] text-[10px] md:text-sm uppercase mt-3 drop-shadow-md">Web Oficial • Temporada 2026</p>
                </div>
            </div>
        </div>
    </header>

    <div class="h-24 md:h-32"></div>

    @if(isset($proximoPartido) && $proximoPartido)
    <section class="max-w-[1700px] mx-auto px-4 mt-6 animate__animated animate__fadeInUp">
        <div class="bg-gradient-to-r from-clubNegro to-clubRojoDeep p-1 rounded-[2rem] shadow-xl hover:shadow-2xl transition-shadow duration-300">
            <div class="bg-white rounded-[1.9rem] p-4 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4 w-full md:w-auto justify-center md:justify-start">
                    <span class="bg-clubRojo text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-md">Siguiente Encuentro</span>
                    <span class="text-slate-500 font-bold text-sm italic">{{ \Carbon\Carbon::parse($proximoPartido->fecha_partido)->format('d/m/Y') }}</span>
                </div>
                
                <div class="flex items-center justify-center gap-6 w-full md:w-auto my-2 md:my-0">
                    <div class="flex flex-col md:flex-row items-center gap-2 md:gap-3 w-[120px] md:w-auto">
                        <span class="font-black uppercase text-xs md:text-base text-slate-800 text-center md:text-right hidden md:block">{{ $proximoPartido->localTeam->nombre }}</span>
                        <img src="{{ asset('storage/' . $proximoPartido->localTeam->escudo_path) }}" class="w-10 h-10 md:w-12 md:h-12 object-contain bg-transparent transform hover:scale-110 transition-transform">
                        <span class="font-black uppercase text-[9px] text-slate-800 text-center md:hidden leading-tight truncate w-full">{{ $proximoPartido->localTeam->nombre }}</span>
                    </div>
                    
                    <span class="font-black text-2xl text-slate-300">VS</span>
                    
                    <div class="flex flex-col-reverse md:flex-row items-center gap-2 md:gap-3 w-[120px] md:w-auto">
                        <span class="font-black uppercase text-[9px] text-slate-800 text-center md:hidden leading-tight truncate w-full">{{ $proximoPartido->visitorTeam->nombre }}</span>
                        <img src="{{ asset('storage/' . $proximoPartido->visitorTeam->escudo_path) }}" class="w-10 h-10 md:w-12 md:h-12 object-contain bg-transparent transform hover:scale-110 transition-transform">
                        <span class="font-black uppercase text-xs md:text-base text-slate-800 text-center md:text-left hidden md:block">{{ $proximoPartido->visitorTeam->nombre }}</span>
                    </div>
                </div>

                <div class="hidden lg:flex w-full md:w-auto justify-end">
                    <span class="text-clubRojo font-black italic uppercase tracking-widest text-sm">#VamosMurianense</span>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="w-full max-w-[1700px] mx-auto px-4 mt-6 animate__animated animate__fadeIn">
        <div class="relative w-full h-[180px] md:h-[320px] rounded-[2.5rem] overflow-hidden shadow-2xl group border-4 border-white bg-slate-200">
            <div id="slider" class="flex w-full h-full">
                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="{{ asset('storage/carrusel/foto2.jpg') }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-8 font-black text-white text-xl md:text-3xl italic uppercase tracking-tighter">La fuerza de un pueblo</div>
                </div>
                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="{{ asset('storage/carrusel/foto1.jpg') }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-8 font-black text-white text-xl md:text-3xl italic uppercase tracking-tighter">Defendiendo el sentimiento</div>
                </div>
            </div>
            <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-clubRojo text-white w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all font-black">&lt;</button>
            <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-clubRojo text-white w-10 h-10 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all font-black">&gt;</button>
        </div>
    </section>

    <main class="w-full max-w-[1700px] mx-auto flex-grow p-4 md:p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 mt-2">
        
        <section class="lg:col-span-8 bg-white p-5 md:p-8 rounded-[2.5rem] shadow-xl border border-slate-100 animate__animated animate__fadeInLeft">
            <div class="flex items-center mb-6 border-b-2 border-rose-50 pb-4">
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-800 flex items-center gap-3">
                    <span class="w-2 h-8 bg-clubRojo rounded-full"></span>
                    Clasificación
                </h2>
            </div>
            <div class="overflow-x-auto custom-scroll">
                <table class="w-full text-xs md:text-sm">
                    <thead class="text-slate-400 uppercase text-[10px] tracking-[0.2em] bg-slate-50/80">
                        <tr>
                            <th class="px-2 py-4 font-bold">Pos</th>
                            <th class="px-4 py-4 text-left">Equipo</th>
                            <th class="px-2 py-4 text-slate-900">Pts</th>
                            <th class="px-2 py-4">PJ</th>
                            <th class="px-2 py-4 text-emerald-600">V</th>
                            <th class="px-2 py-4 text-amber-500">E</th>
                            <th class="px-2 py-4 text-rose-500">D</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($standings as $teamStat)
                            <tr class="group transition-all hover:bg-rose-50/40">
                                <td class="px-2 py-3 text-center">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-slate-900 text-white font-black group-hover:bg-clubRojo shadow-md">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 font-bold uppercase tracking-tighter text-slate-700 group-hover:text-clubRojo">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('storage/' . $teamStat->team->escudo_path) }}" 
                                             alt="Escudo" class="w-6 h-6 md:w-8 md:h-8 object-contain">
                                        <span>{{ $teamStat->team->nombre }}</span>
                                    </div>
                                </td>
                                <td class="px-2 py-3 text-center font-black text-xl text-slate-900">{{ $teamStat->puntos }}</td>
                                <td class="px-2 py-3 text-center font-bold text-slate-400">{{ $teamStat->jugados }}</td>
                                <td class="px-2 py-3 text-center text-emerald-600 font-bold">{{ $teamStat->ganados }}</td>
                                <td class="px-2 py-3 text-center text-amber-500 font-bold">{{ $teamStat->empatados }}</td>
                                <td class="px-2 py-3 text-center text-rose-500 font-bold">{{ $teamStat->perdidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="lg:col-span-4 flex flex-col animate__animated animate__fadeInRight">
            <section id="caja-resultados" class="bg-white p-6 rounded-[2.5rem] shadow-xl border border-slate-100 h-full flex flex-col transition-opacity duration-300">
                <div class="flex items-center justify-between mb-4 pb-4 border-b-2 border-slate-50">
                    <h2 class="text-xl md:text-2xl font-black uppercase flex items-center gap-2">
                        <span class="w-2 h-7 bg-clubRojo rounded-full"></span>
                        Jornada {{ $jornadaMostrada }}
                    </h2>
                    <div class="flex gap-2">
                        @if($jornadaAnterior)
                            <a href="?jornada={{ $jornadaAnterior }}" class="nav-jornada w-9 h-9 bg-slate-100 hover:bg-clubRojo hover:text-white rounded-full flex items-center justify-center transition-colors font-black shadow-sm">&lt;</a>
                        @endif
                        @if($jornadaSiguiente)
                            <a href="?jornada={{ $jornadaSiguiente }}" class="nav-jornada w-9 h-9 bg-slate-100 hover:bg-clubRojo hover:text-white rounded-full flex items-center justify-center transition-colors font-black shadow-sm">&gt;</a>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col gap-4 flex-grow overflow-hidden">
                    @forelse($games as $game)
                        <div class="group bg-slate-50 px-4 py-4 rounded-3xl border border-slate-100 flex-1 flex flex-col justify-center transition-all hover:bg-white hover:shadow-xl hover:-translate-y-1">
                            <div class="flex justify-between items-center w-full">
                                <div class="w-2/5 flex flex-col items-center gap-2">
                                    <img src="{{ asset('storage/' . $game->localTeam->escudo_path) }}" class="w-10 h-10 md:w-14 md:h-14 object-contain drop-shadow-md transform group-hover:scale-110 transition-transform">
                                    <span class="text-[9px] md:text-[11px] font-black uppercase text-slate-500 text-center group-hover:text-clubRojo leading-tight truncate w-full">{{ $game->localTeam->nombre }}</span>
                                </div>
                                
                                <div class="w-1/5 text-center">
                                    @if($game->goles_local !== null)
                                        <div class="text-2xl md:text-3xl font-black italic text-slate-800 tracking-tighter">{{ $game->goles_local }}-{{ $game->goles_visitante }}</div>
                                    @else
                                        <div class="text-lg font-black italic text-slate-300">vs</div>
                                    @endif
                                </div>
                                
                                <div class="w-2/5 flex flex-col items-center gap-2">
                                    <img src="{{ asset('storage/' . $game->visitorTeam->escudo_path) }}" class="w-10 h-10 md:w-14 md:h-14 object-contain drop-shadow-md transform group-hover:scale-110 transition-transform">
                                    <span class="text-[9px] md:text-[11px] font-black uppercase text-slate-500 text-center group-hover:text-clubRojo leading-tight truncate w-full">{{ $game->visitorTeam->nombre }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center h-full flex items-center justify-center text-slate-300 font-black italic uppercase tracking-widest">No hay partidos</div>
                    @endforelse
                </div>
            </section>
        </aside>
    </main>

    <section class="w-full max-w-[1700px] mx-auto px-4 md:px-6 mb-8 animate__animated animate__fadeInUp">
        <div class="bg-white p-6 md:p-10 rounded-[2.5rem] shadow-xl border border-slate-100">
            <div class="flex items-center justify-between mb-8 border-b-2 border-rose-50 pb-4">
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-800 flex items-center gap-3">
                    <span class="w-2 h-8 bg-clubRojo rounded-full"></span>
                    Últimas Noticias
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse($noticias as $noticia)
                    <article class="group cursor-pointer flex flex-col bg-slate-50 rounded-[2rem] border border-slate-100 overflow-hidden hover:bg-white hover:shadow-2xl transition-all hover:-translate-y-2 duration-300">
                        <div class="relative h-48 md:h-56 overflow-hidden bg-slate-200">
                            @if($noticia->imagen_path)
                                <img src="{{ asset('storage/' . $noticia->imagen_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-300 text-slate-500 font-black tracking-widest uppercase">CD MURIANENSE</div>
                            @endif
                            <div class="absolute top-4 left-4 bg-clubRojo text-white text-[9px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-md">{{ $noticia->categoria }}</div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <span class="text-slate-400 font-bold text-[10px] uppercase tracking-widest mb-2">{{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d M, Y') }}</span>
                            <h3 class="text-xl font-black text-slate-800 leading-tight mb-3 group-hover:text-clubRojo transition-colors">{{ $noticia->titulo }}</h3>
                            <p class="text-slate-500 text-sm font-medium line-clamp-2 mb-4">{{ $noticia->extracto }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('noticias.show', $noticia) }}" class="text-clubRojo font-black text-xs uppercase tracking-widest flex items-center gap-1 group-hover:translate-x-2 transition-transform">Leer más &rsaquo;</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-16 text-center text-slate-400 font-black italic uppercase tracking-widest">No hay noticias publicadas todavía</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="w-full max-w-[1700px] mx-auto px-4 md:px-6 mb-8 animate__animated animate__fadeInUp">
        <div class="bg-white p-6 md:p-10 rounded-[2rem] shadow-xl border border-slate-100 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            
            <div class="flex flex-col items-center p-8 bg-slate-50 rounded-[2rem] hover:bg-rose-50 transition-colors duration-300">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 text-2xl">📍</div>
                <h3 class="font-black uppercase text-slate-800 mb-2 tracking-tight">Sede Oficial</h3>
                <p class="text-slate-500 font-bold text-sm leading-relaxed uppercase">C. Vista Alegre, 1<br>Cerro Muriano, Córdoba</p>
            </div>

            <div class="flex flex-col items-center p-8 bg-slate-50 rounded-[2rem] hover:bg-rose-50 transition-colors duration-300">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 text-2xl">📞</div>
                <h3 class="font-black uppercase text-slate-800 mb-2 tracking-tight">Contacto</h3>
                <p class="text-slate-500 font-bold text-sm leading-relaxed">687 811 486<br>698 484 597</p>
            </div>

            <div class="flex flex-col items-center p-8 bg-slate-50 rounded-[2rem] hover:bg-rose-50 transition-colors duration-300">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-sm mb-4 text-2xl">📱</div>
                <h3 class="font-black uppercase text-slate-800 mb-2 tracking-tight">Síguenos</h3>
                <div class="flex gap-6 mt-2">
                    <a href="https://www.instagram.com/cdmurianense/" target="_blank" class="transform hover:scale-110 transition-transform" title="Instagram">
                        <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" stroke="#E1306C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 16V8C3 5.23858 5.23858 3 8 3H16C18.7614 3 21 5.23858 21 8V16C21 18.7614 18.7614 21 16 21H8C5.23858 21 3 18.7614 3 16Z" stroke="#E1306C" stroke-width="2"/>
                            <path d="M17.5 6.51L17.51 6.49889" stroke="#E1306C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/p/CD-Murianense-61577181990235/" target="_blank" class="transform hover:scale-110 transition-transform" title="Facebook">
                        <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 2H15C13.6739 2 12.4021 2.52678 11.4645 3.46447C10.5268 4.40215 10 5.67392 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73478 14.1054 6.48043 14.2929 6.29289C14.4804 6.10536 14.7348 6 15 6H18V2Z" fill="#1877F2"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full bg-white py-16 border-t border-slate-100">
        <div class="max-w-[1700px] mx-auto px-8">
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20">
                <img src="{{ asset('storage/patrocinadores/bar_x.jpg') }}" class="h-12 md:h-16 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer" alt="Patrocinador">
                <img src="{{ asset('storage/patrocinadores/smn.jpg') }}" class="h-12 md:h-16 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer" alt="Patrocinador">
                <img src="{{ asset('storage/patrocinadores/ayuntamiento.png') }}" class="h-12 md:h-16 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer" alt="Ayuntamiento">
                <img src="{{ asset('storage/patrocinadores/color_pecks.jpeg') }}" class="h-12 md:h-16 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer" alt="Caja Rural">
            </div>
        </div>
    </section>

    <footer class="bg-clubRojoDeep text-white py-10 px-6 border-t-8 border-clubNegro mt-auto shadow-inner">
        <div class="max-w-[1700px] mx-auto flex flex-col md:flex-row justify-between items-center gap-10">
            <div class="flex flex-col items-center md:items-start">
                <span class="text-2xl font-black italic tracking-tighter uppercase block">CD MURIANENSE</span>
                <span class="text-[9px] font-bold tracking-[0.3em] uppercase text-rose-300/60">Orgullo de nuestra tierra</span>
            </div>
            <p class="text-[10px] font-bold uppercase tracking-widest text-white/80">&copy; {{ date('Y') }} • Cerro Muriano, Córdoba</p>
            <div class="flex flex-col items-center md:items-end gap-1">
                <span class="text-xl font-black italic text-white uppercase mb-2 tracking-tighter">#VamosMurianense</span>
                <div class="flex gap-4 text-[9px] font-bold text-rose-300/50 uppercase tracking-widest">
                    <a href="#" class="hover:text-white transition-colors">Aviso Legal</a>
                    <span>•</span>
                    <a href="#" class="hover:text-white transition-colors">Privacidad</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Carrusel
        let currentSlide = 0;
        const totalSlides = 2;
        const slider = document.getElementById('slider');
        function nextSlide() { currentSlide = (currentSlide + 1) % totalSlides; slider.style.transform = `translateX(-${currentSlide * 100}%)`; }
        function prevSlide() { currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; slider.style.transform = `translateX(-${currentSlide * 100}%)`; }
        setInterval(nextSlide, 5000);

        // SPA Resultados (Fetch sin recarga)
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.nav-jornada');
            if (link) {
                e.preventDefault();
                const url = link.getAttribute('href');
                const caja = document.getElementById('caja-resultados');
                caja.style.opacity = '0.4';
                fetch(url).then(r => r.text()).then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    caja.innerHTML = doc.getElementById('caja-resultados').innerHTML;
                    caja.style.opacity = '1';
                    window.history.pushState({}, '', url);
                });
            }
        });
    </script>
</body>
</html>