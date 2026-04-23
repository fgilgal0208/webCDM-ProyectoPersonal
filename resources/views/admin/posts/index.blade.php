<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestionar Noticias - Admin</title>
</head>
<body class="bg-slate-100 font-sans p-4 md:p-10 min-h-screen">
    
    <div class="max-w-7xl mx-auto bg-white p-6 md:p-10 rounded-[2rem] shadow-xl border-t-8 border-rose-600">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-black uppercase text-slate-800 tracking-tight">Tus Noticias</h1>
                <p class="text-slate-400 font-bold text-sm">Gestiona el contenido de la portada</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.dashboard') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-xl font-bold uppercase text-xs transition-colors shadow-sm">Volver</a>
                <a href="{{ route('posts.create') }}" class="bg-slate-900 hover:bg-rose-600 text-white px-6 py-3 rounded-xl font-black uppercase text-xs transition-colors shadow-md flex items-center gap-2">
                    <span class="text-lg leading-none">+</span> Nueva Noticia
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 px-6 py-4 rounded-xl mb-8 font-bold text-sm flex items-center gap-3">
                <span>✅</span> {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 text-[10px] uppercase tracking-widest border-b border-slate-100">
                        <th class="p-4 font-bold rounded-tl-xl">Fecha</th>
                        <th class="p-4 font-bold">Categoría</th>
                        <th class="p-4 font-bold">Título</th>
                        <th class="p-4 font-bold text-right rounded-tr-xl">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @forelse($posts as $post)
                        <tr class="hover:bg-rose-50/30 transition-colors group">
                            <td class="p-4 text-slate-500 font-bold whitespace-nowrap">{{ \Carbon\Carbon::parse($post->fecha_publicacion)->format('d/m/Y') }}</td>
                            <td class="p-4">
                                <span class="bg-rose-100 text-rose-700 text-[9px] font-black uppercase tracking-widest px-2 py-1 rounded-md">{{ $post->categoria }}</span>
                            </td>
                            <td class="p-4 font-bold text-slate-800">{{ $post->titulo }}</td>
                            <td class="p-4 flex justify-end gap-2">
                                <a href="{{ route('posts.edit', $post) }}" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg text-xs font-bold transition-colors inline-block text-center">Editar</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar esta noticia?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-600 hover:text-white text-rose-600 rounded-lg text-xs font-bold transition-colors">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-10 text-center text-slate-400 font-bold italic">No has publicado ninguna noticia todavía.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>