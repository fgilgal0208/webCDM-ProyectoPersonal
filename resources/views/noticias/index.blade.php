<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Noticias - CD MURIANENSE</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { clubRojo: '#E11D48', clubRojoDeep: '#9F1239', clubNegro: '#0f172a' },
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <!-- === HEADER COMPACTO === -->
    <header class="relative bg-clubRojoDeep text-white py-6 px-6 border-b-8 border-clubNegro shadow-xl z-30">
        <div class="max-w-[1700px] mx-auto flex items-center gap-6">
            <a href="{{ route('inicio') }}" class="bg-white p-2 rounded-2xl shadow-lg transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('storage/escudos/murianense.jpg') }}" alt="Escudo" class="w-16 h-16 object-contain">
            </a>
            <div>
                <h1 class="text-3xl font-black italic tracking-tighter uppercase drop-shadow-md">CD <span class="text-white">MURIANENSE</span></h1>
                <a href="{{ route('inicio') }}" class="text-rose-200 font-bold text-xs uppercase tracking-widest hover:text-white transition-colors">&larr; Volver a la portada</a>
            </div>
        </div>
    </header>

    <!-- === CONTENIDO PRINCIPAL === -->
    <main class="w-full max-w-[1700px] mx-auto flex-grow p-6 py-12">
        <div class="flex items-center justify-between mb-10 border-b-2 border-rose-50 pb-4">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($noticias as $noticia)
                <article class="group cursor-pointer flex flex-col bg-white rounded-[2rem] shadow-lg border border-slate-100 overflow-hidden hover:shadow-2xl transition-all hover:-translate-y-2 duration-300">
                    <div class="relative h-56 overflow-hidden bg-slate-200">
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
                        <p class="text-slate-500 text-sm font-medium line-clamp-3 mb-4">{{ $noticia->extracto }}</p>
                        <div class="mt-auto pt-4 border-t border-slate-50">
                            <a href="{{ route('noticias.show', $noticia) }}" class="text-clubRojo font-black text-xs uppercase tracking-widest flex items-center gap-1 group-hover:translate-x-2 transition-transform">Leer más &rsaquo;</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-16 text-center text-slate-400 font-black italic uppercase tracking-widest">No hay noticias publicadas todavía</div>
            @endforelse
        </div>

        <!-- PAGINACIÓN AUTOMÁTICA -->
        <div class="mt-16 flex justify-center">
            {{ $noticias->links() }}
        </div>
    </main>

    <!-- === FOOTER COMPACTO === -->
    <footer class="bg-clubRojoDeep text-white py-8 border-t-8 border-clubNegro mt-auto">
        <div class="max-w-[1700px] mx-auto px-6 text-center">
            <span class="text-xl font-black italic tracking-tighter uppercase block mb-1">CD MURIANENSE</span>
            <p class="text-[10px] font-bold uppercase tracking-widest text-white/80">&copy; {{ date('Y') }} • Cerro Muriano, Córdoba</p>
        </div>
    </footer>
</body>
</html>