<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Escribir Noticia - Admin</title>
</head>
<body class="bg-slate-100 font-sans p-4 md:p-10 min-h-screen">
    
    <div class="max-w-4xl mx-auto bg-white p-6 md:p-10 rounded-[2rem] shadow-xl border-t-8 border-rose-600">
        
        <div class="flex justify-between items-center mb-8 pb-6 border-b border-slate-100">
            <h1 class="text-2xl font-black uppercase text-slate-800 tracking-tight">Escribir Nueva Noticia</h1>
            <a href="{{ route('posts.index') }}" class="text-slate-400 hover:text-rose-600 font-bold uppercase text-xs tracking-widest transition-colors">Cancelar</a>
        </div>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2">Título de la noticia</label>
                    <input type="text" name="titulo" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-rose-600 outline-none transition-all font-bold text-slate-800">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2">Categoría</label>
                    <select name="categoria" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-rose-600 outline-none transition-all font-bold text-slate-700 bg-white">
                        <option value="Club">Club</option>
                        <option value="Crónica">Crónica</option>
                        <option value="Fichajes">Fichajes</option>
                        <option value="Cantera">Cantera</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2">Extracto Breve (Para la tarjeta de la portada)</label>
                <textarea name="extracto" rows="2" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-rose-600 outline-none transition-all text-sm text-slate-600"></textarea>
            </div>

            <div>
                <label class="block text-[10px] font-black uppercase text-slate-400 mb-2">Cuerpo de la Noticia</label>
                <textarea name="cuerpo" rows="8" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-rose-600 outline-none transition-all text-sm text-slate-600"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2">Fecha de Publicación</label>
                    <input type="date" name="fecha_publicacion" required value="{{ date('Y-m-d') }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-rose-600 outline-none transition-all font-bold text-slate-700">
                </div>
                <div>
                    <label class="block text-[10px] font-black uppercase text-slate-400 mb-2">Imagen de Portada (Opcional)</label>
                    <input type="file" name="imagen" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100 transition-all cursor-pointer">
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full md:w-auto px-10 py-4 bg-slate-900 hover:bg-rose-600 text-white font-black rounded-xl transition-all uppercase tracking-widest shadow-lg">
                    Publicar Noticia
                </button>
            </div>
        </form>

    </div>
</body>
</html>