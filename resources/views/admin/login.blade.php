<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Acceso Admin - CD Murianense</title>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-[2rem] shadow-2xl w-full max-w-md border-t-8 border-rose-600">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black italic text-slate-800 uppercase">Panel <span class="text-rose-600">Admin</span></h1>
            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mt-2">CD Murianense</p>
        </div>

        <form action="{{ url('/admin') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs font-black uppercase text-slate-500 mb-2">Usuario</label>
                <input type="text" name="username" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-rose-600 outline-none transition-all" required>
            </div>
            <div>
                <label class="block text-xs font-black uppercase text-slate-500 mb-2">Contraseña</label>
                <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-rose-600 outline-none transition-all" required>
            </div>
            
            @if($errors->any())
                <p class="text-rose-600 text-xs font-bold bg-rose-50 p-3 rounded-lg">{{ $errors->first() }}</p>
            @endif

            <button type="submit" class="w-full bg-slate-900 hover:bg-rose-600 text-white font-black py-4 rounded-xl transition-all uppercase tracking-widest shadow-lg">
                Entrar al Sistema
            </button>
        </form>
    </div>
</body>
</html>