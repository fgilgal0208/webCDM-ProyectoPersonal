<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->titulo }} - CD MURIANENSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen">

    <nav class="bg-[#9F1239] text-white py-4 px-6 shadow-lg">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="{{ route('inicio') }}" class="font-black italic uppercase tracking-tighter text-xl">CD MURIANENSE</a>
            <a href="{{ route('inicio') }}" class="text-xs font-bold uppercase tracking-widest bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg transition-all text-white">Volver al inicio</a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-10 px-6">
        <article class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
            <div class="relative h-[300px] md:h-[450px] bg-slate-200">
                @if($post->imagen_path)
                    <img src="{{ asset('storage/' . $post->imagen_path) }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-slate-300 text-slate-400 font-black text-4xl">CD MURIANENSE</div>
                @endif
                <div class="absolute top-6 left-6 bg-[#E11D48] text-white text-xs font-black uppercase tracking-widest px-4 py-2 rounded-full shadow-lg">
                    {{ $post->categoria }}
                </div>
            </div>

            <div class="p-8 md:p-16">
                <div class="flex items-center gap-4 mb-6 text-slate-400 font-bold text-xs uppercase tracking-widest">
                    <span>{{ \Carbon\Carbon::parse($post->fecha_publicacion)->format('d F, Y') }}</span>
                    <span class="w-1.5 h-1.5 bg-slate-200 rounded-full"></span>
                    <span>Por Admin</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-8 italic uppercase tracking-tighter">
                    {{ $post->titulo }}
                </h1>

                <div class="text-slate-600 leading-relaxed text-lg space-y-6">
                    <p class="font-bold text-slate-800 text-xl border-l-4 border-[#E11D48] pl-6 italic">
                        {{ $post->extracto }}
                    </p>
                    
                    <div class="whitespace-pre-line text-slate-600">
                        {{ $post->cuerpo }}
                    </div>
                </div>
            </div>
        </article>
    </main>

    <footer class="py-10 text-center text-slate-400 text-[10px] font-bold uppercase tracking-widest">
        &copy; {{ date('Y') }} CD Murianense • Web Oficial
    </footer>

</body>
</html>