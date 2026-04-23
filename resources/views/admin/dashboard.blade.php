<div class="p-10 font-sans">
    <h1 class="text-3xl font-black">Bienvenido al Panel de Control</h1>
    <p class="mt-4">Desde aquí podrás gestionar tus noticias.</p>
    <a href="{{ route('posts.index') }}" class="inline-block mt-6 bg-rose-600 text-white px-6 py-2 rounded-lg font-bold">Gestionar Noticias</a>
    
    <form action="{{ route('logout') }}" method="POST" class="mt-10">
        @csrf
        <button type="submit" class="text-slate-400 hover:text-rose-600 font-bold uppercase text-xs">Cerrar Sesión</button>
    </form>
</div>