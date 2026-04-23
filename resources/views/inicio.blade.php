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
        /* Scrollbar fina para las tablas */
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

    <section class="w-full max-w-[1700px] mx-auto px-4 mt-4 animate__animated animate__fadeIn">
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

    <main class="w-full max-w-[1700px] mx-auto flex-grow p-4 md:p-6 grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <section class="lg:col-span-8 bg-white p-5 md:p-8 rounded-[2.5rem] shadow-xl border border-slate-100 flex flex-col animate__animated animate__fadeInLeft">
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
                            <th class="px-2 py-4">Pts</th>
                            <th class="px-2 py-4">PJ</th>
                            <th class="px-2 py-4">V</th>
                            <th class="px-2 py-4">E</th>
                            <th class="px-2 py-4">D</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($standings as $teamStat)
                            <tr class="group transition-all hover:bg-rose-50/40">
                                <td class="px-2 py-3 text-center">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-slate-900 text-white font-black group-hover:bg-clubRojo transition-all shadow-md">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-4">
                                        @if($teamStat->team->escudo_path)
                                            <img src="{{ asset('storage/' . $teamStat->team->escudo_path) }}" class="w-9 h-9 object-contain drop-shadow-sm group-hover:scale-110 transition-transform">
                                        @else
                                            <div class="w-9 h-9 bg-slate-100 rounded-full flex items-center justify-center border border-slate-200">⚽</div>
                                        @endif
                                        <span class="text-sm md:text-base font-bold text-slate-700 group-hover:text-clubRojo uppercase tracking-tighter">
                                            {{ $teamStat->team->nombre }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-2 py-3 text-center font-black text-xl md:text-2xl text-slate-900">{{ $teamStat->puntos }}</td>
                                <td class="px-2 py-3 text-center font-bold text-slate-400">{{ $teamStat->jugados }}</td>
                                <td class="px-2 py-3 text-center text-emerald-600 font-bold">{{ $teamStat->ganados }}</td>
                                <td class="px-2 py-3 text-center text-amber-500 font-bold">{{ $teamStat->empatados }}</td>
                                <td class="px-2 py-3 text-center text-rose-500 font-bold">{{ $teamStat->perdidos }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="py-10 text-center font-bold text-slate-300 italic uppercase">Sin datos de liga</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="lg:col-span-4 flex flex-col animate__animated animate__fadeInRight">
            <section id="caja-resultados" class="bg-white p-6 rounded-[2.5rem] shadow-xl border border-slate-100 h-full flex flex-col relative transition-opacity duration-300">
                <div class="flex items-center justify-between mb-4 pb-4 border-b-2 border-slate-50 shrink-0">
                    <h2 class="text-xl md:text-2xl font-black uppercase flex items-center gap-2">
                        <span class="w-2 h-7 bg-clubRojo rounded-full"></span>
                        Jornada {{ $jornadaMostrada }}
                    </h2>
                    <div class="flex gap-2">
                        @if($jornadaAnterior)
                            <a href="?jornada={{ $jornadaAnterior }}" class="nav-jornada w-9 h-9 bg-slate-100 hover:bg-clubRojo hover:text-white rounded-full flex items-center justify-center transition-colors font-black shadow-sm border border-slate-200">&lt;</a>
                        @else
                            <div class="w-9 h-9 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center font-black border border-slate-100 cursor-not-allowed">&lt;</div>
                        @endif

                        @if($jornadaSiguiente)
                            <a href="?jornada={{ $jornadaSiguiente }}" class="nav-jornada w-9 h-9 bg-slate-100 hover:bg-clubRojo hover:text-white rounded-full flex items-center justify-center transition-colors font-black shadow-sm border border-slate-200">&gt;</a>
                        @else
                            <div class="w-9 h-9 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center font-black border border-slate-100 cursor-not-allowed">&gt;</div>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col gap-3 flex-grow overflow-hidden">
                    @forelse($games as $game)
                        <div class="group bg-slate-50 px-4 py-2 rounded-3xl border border-slate-100 transition-all hover:bg-white hover:shadow-xl hover:-translate-y-1 flex-1 flex flex-col justify-center">
                            <div class="flex justify-between items-center w-full">
                                <div class="w-2/5 flex flex-col items-center gap-1.5">
                                    @if($game->localTeam->escudo_path)
                                        <img src="{{ asset('storage/' . $game->localTeam->escudo_path) }}" class="w-9 h-9 md:w-11 md:h-11 object-contain drop-shadow-md group-hover:scale-110 transition-transform">
                                    @else
                                        <div class="w-9 h-9 md:w-11 md:h-11 bg-white rounded-full flex items-center justify-center border border-slate-200 shadow-inner text-xs">🏠</div>
                                    @endif
                                    <span class="text-[9px] font-black uppercase text-slate-400 text-center leading-tight group-hover:text-clubRojo truncate w-full">{{ $game->localTeam->nombre }}</span>
                                </div>

                                <div class="w-1/5 flex flex-col items-center">
                                    <div class="text-xl md:text-2xl font-black italic text-slate-800">
                                        {{ $game->goles_local }}<span class="text-clubRojo mx-0.5">-</span>{{ $game->goles_visitante }}
                                    </div>
                                    <span class="text-[7px] font-black bg-clubRojo text-white px-2 py-0.5 rounded-full mt-1 uppercase shadow-sm">Final</span>
                                </div>

                                <div class="w-2/5 flex flex-col items-center gap-1.5">
                                    @if($game->visitorTeam->escudo_path)
                                        <img src="{{ asset('storage/' . $game->visitorTeam->escudo_path) }}" class="w-9 h-9 md:w-11 md:h-11 object-contain drop-shadow-md group-hover:scale-110 transition-transform">
                                    @else
                                        <div class="w-9 h-9 md:w-11 md:h-11 bg-white rounded-full flex items-center justify-center border border-slate-200 shadow-inner text-xs">🚌</div>
                                    @endif
                                    <span class="text-[9px] font-black uppercase text-slate-400 text-center leading-tight group-hover:text-clubRojo truncate w-full">{{ $game->visitorTeam->nombre }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center h-full flex items-center justify-center text-slate-300 font-black italic border-2 border-dashed border-slate-100 rounded-3xl">No hay partidos</div>
                    @endforelse
                </div>
            </section>
        </aside>
    </main>

    <section class="w-full max-w-[1700px] mx-auto px-4 md:px-6 mb-8 animate__animated animate__fadeInUp">
        <div class="bg-white p-6 md:p-10 rounded-[2.5rem] shadow-xl border border-slate-100">
            <div class="flex items-center mb-8 border-b-2 border-rose-50 pb-4">
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-800 flex items-center gap-3">
                    <span class="w-2 h-8 bg-clubRojo rounded-full"></span>
                    Contacto y Sede
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <div class="flex flex-col items-center justify-center text-center p-8 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl shadow-sm mb-4 border border-slate-100">📍</div>
                    <h3 class="font-black uppercase text-slate-800 tracking-tight text-lg mb-2">Sede del Club</h3>
                    <p class="text-slate-500 font-bold text-sm">C. Vista Alegre, 1<br>14350 Cerro Muriano, Córdoba</p>
                </div>

                <div class="flex flex-col items-center justify-center text-center p-8 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl shadow-sm mb-4 border border-slate-100">📞</div>
                    <h3 class="font-black uppercase text-slate-800 tracking-tight text-lg mb-2">Teléfonos</h3>
                    <p class="text-slate-500 font-bold text-sm">687 811 486<br>698 484 597</p>
                </div>

                <div class="flex flex-col items-center justify-center text-center p-8 bg-slate-50 rounded-[2rem] border border-slate-100 hover:bg-white hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl shadow-sm mb-4 border border-slate-100">📱</div>
                    <h3 class="font-black uppercase text-slate-800 tracking-tight text-lg mb-2">Síguenos</h3>
                    <div class="flex gap-4 mt-2">
                        <a href="https://www.instagram.com/cdmurianense/" target="_blank" class="w-12 h-12 bg-gradient-to-tr from-yellow-400 via-rose-500 to-purple-600 text-white rounded-2xl flex items-center justify-center hover:scale-110 transition-transform shadow-md">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/p/CD-Murianense-61577181990235/" target="_blank" class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center hover:scale-110 transition-transform shadow-md">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full bg-white py-16 border-t border-slate-100">
        <div class="max-w-[1700px] mx-auto text-center mb-10">
            <p class="text-xs font-black uppercase tracking-[0.3em] text-slate-400">Patrocinadores Oficiales</p>
        </div>
        
        <div class="flex flex-wrap justify-center items-center gap-10 md:gap-20 px-8 max-w-6xl mx-auto">
            <a href="#" target="_blank" class="block hover:scale-110 transition-transform duration-300">
                <img src="{{ asset('storage/patrocinadores/bar_x.jpg') }}" class="h-16 md:h-24 object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
            </a>
            <a href="#" target="_blank" class="block hover:scale-110 transition-transform duration-300">
                <img src="{{ asset('storage/patrocinadores/smn.jpg') }}" class="h-16 md:h-24 object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
            </a>
            <a href="#" target="_blank" class="block hover:scale-110 transition-transform duration-300">
                <img src="{{ asset('storage/patrocinadores/gym.jpg') }}" class="h-16 md:h-24 object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
            </a>
            <a href="#" target="_blank" class="block hover:scale-110 transition-transform duration-300">
                <img src="{{ asset('storage/patrocinadores/ayuntamiento.png') }}" class="h-16 md:h-24 object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
            </a>
            <a href="#" target="_blank" class="block hover:scale-110 transition-transform duration-300">
                <img src="{{ asset('storage/patrocinadores/color_pecks.jpeg') }}"class="h-16 md:h-24 object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
            </a>
        </div>
    </section>

<footer class="bg-clubRojoDeep text-white py-6 px-6 border-t-4 border-clubNegro mt-auto relative shadow-inner">
        <div class="max-w-[1700px] mx-auto flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
            
            <div class="flex flex-col items-center md:items-start leading-tight">
                <span class="text-xl font-black italic tracking-tighter text-white uppercase">CD MURIANENSE</span>
                <span class="text-[8px] font-bold tracking-[0.3em] uppercase text-rose-300/60 italic">Todos los derechos reservados</span>
            </div>
            
            <div class="text-center">
                <p class="text-[10px] font-bold uppercase tracking-widest text-white/80">
                    &copy; {{ date('Y') }} • Cerro Muriano, Córdoba
                </p>
            </div>

            <div class="flex flex-col items-center md:items-end gap-1">
                <span class="text-sm md:text-base font-black italic tracking-tighter text-white/90 uppercase hover:text-white transition-colors cursor-default">
                    #VamosMurianense
                </span>
                <div class="flex gap-2 text-[8px] font-bold tracking-[0.2em] uppercase text-rose-300/50">
                    <a href="#" class="hover:text-white transition-colors">Aviso Legal</a>
                    <span>•</span>
                    <a href="#" class="hover:text-white transition-colors">Privacidad</a>
                </div>
            </div>

        </div>
    </footer>

    <script>
        let currentSlide = 0;
        const totalSlides = 2;
        const slider = document.getElementById('slider');
        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
        setInterval(nextSlide, 5000);
    </script>

    <script>
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.nav-jornada');
            if (link) {
                e.preventDefault();
                const url = link.getAttribute('href');
                actualizarResultados(url);
            }
        });

        function actualizarResultados(url) {
            const caja = document.getElementById('caja-resultados');
            caja.style.opacity = '0.4';
            caja.style.pointerEvents = 'none';

            fetch(url)
                .then(respuesta => respuesta.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const nuevaCaja = doc.getElementById('caja-resultados');
                    
                    caja.innerHTML = nuevaCaja.innerHTML;
                    
                    caja.style.opacity = '1';
                    caja.style.pointerEvents = 'auto';
                    window.history.pushState({}, '', url);
                })
                .catch(error => {
                    console.error('Error al cargar la jornada:', error);
                    caja.style.opacity = '1';
                    caja.style.pointerEvents = 'auto';
                });
        }
    </script>
</body>
</html>