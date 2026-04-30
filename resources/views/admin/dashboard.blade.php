<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin MURIANENSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col">

    <!-- Header Panel -->
    <header class="bg-[#9F1239] text-white py-4 px-6 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-black italic uppercase tracking-widest">CD Murianense <span class="text-rose-300">Admin</span></h1>
            <nav class="flex gap-4">
                <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-white border-b-2 border-white pb-1">Dashboard</a>
                <a href="{{ route('posts.index') }}" class="text-xs font-bold uppercase tracking-widest hover:text-rose-200 transition-colors">Noticias</a>
                <a href="{{ route('games.index') }}" class="text-xs font-bold uppercase tracking-widest hover:text-rose-200 transition-colors">Resultados</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs font-bold uppercase tracking-widest text-rose-300 hover:text-white transition-colors">Salir</button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="max-w-6xl mx-auto py-12 px-6 flex-grow w-full">
        
        <!-- Tarjeta de Bienvenida -->
        <div class="bg-white rounded-[2.5rem] p-10 shadow-xl border border-slate-100 mb-8 flex flex-col md:flex-row justify-between items-center gap-6 relative overflow-hidden">
            <div class="absolute -right-20 -top-20 opacity-5 pointer-events-none">
                <div class="w-96 h-96 bg-[#E11D48] rounded-full blur-3xl"></div>
            </div>
            
            <div class="relative z-10 text-center md:text-left">
                <h2 class="text-4xl font-black uppercase text-slate-800 tracking-tight mb-2">Panel de Control</h2>
                <p class="text-slate-500 font-medium text-lg">Gestiona las noticias, resultados y el contenido de tu web desde aquí.</p>
            </div>
            
            <div class="relative z-10 flex gap-4 mt-4 md:mt-0">
                <a href="{{ route('inicio') }}" target="_blank" class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest transition-colors shadow-lg flex items-center gap-2 group">
                    <span>Ver Web</span>
                    <span class="group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">&nearr;</span>
                </a>
            </div>
        </div>

        <!-- Grid de Accesos Directos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Módulo Noticias -->
            <a href="{{ route('posts.index') }}" class="group bg-white rounded-[2rem] p-8 shadow-lg border-2 border-transparent hover:border-[#E11D48] hover:shadow-2xl transition-all duration-300 flex flex-col">
                <div class="w-16 h-16 bg-rose-100 text-[#E11D48] rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform">
                    📰
                </div>
                <h3 class="text-2xl font-black uppercase text-slate-800 tracking-tight mb-2 group-hover:text-[#E11D48] transition-colors">Gestor de Noticias</h3>
                <p class="text-slate-500 font-medium mb-8 flex-grow leading-relaxed">Redacta crónicas, anuncia fichajes o publica comunicados oficiales. El sistema recorta y optimiza tus fotos automáticamente.</p>
                <div class="mt-auto">
                    <span class="text-[#E11D48] font-black text-xs uppercase tracking-widest flex items-center gap-2 group-hover:translate-x-2 transition-transform">
                        Entrar al gestor &rsaquo;
                    </span>
                </div>
            </a>

            <!-- Módulo Resultados -->
            <a href="{{ route('games.index') }}" class="group bg-white rounded-[2rem] p-8 shadow-lg border-2 border-transparent hover:border-[#E11D48] hover:shadow-2xl transition-all duration-300 flex flex-col">
                <div class="w-16 h-16 bg-rose-100 text-[#E11D48] rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 group-hover:-rotate-3 transition-transform">
                    ⚽
                </div>
                <h3 class="text-2xl font-black uppercase text-slate-800 tracking-tight mb-2 group-hover:text-[#E11D48] transition-colors">Resultados y Calendario</h3>
                <p class="text-slate-500 font-medium mb-8 flex-grow leading-relaxed">Añade los goles de la jornada cada fin de semana. El banner de "Próximo Partido" de la portada saltará a la siguiente jornada solo.</p>
                <div class="mt-auto">
                    <span class="text-[#E11D48] font-black text-xs uppercase tracking-widest flex items-center gap-2 group-hover:translate-x-2 transition-transform">
                        Actualizar resultados &rsaquo;
                    </span>
                </div>
            </a>

        </div>
    </main>

    <!-- Footer Panel -->
    <footer class="text-center py-8 text-slate-400 font-bold text-[10px] uppercase tracking-widest bg-slate-50 mt-auto">
        &copy; {{ date('Y') }} CD Murianense • Sistema de Gestión 
    </footer>

</body>
</html>