<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * 1. INDEX: Muestra la tabla con todas las noticias
     */
    public function index()
    {
        // Traemos todas las noticias ordenadas de la más reciente a la más antigua
        $posts = Post::orderBy('fecha_publicacion', 'desc')->get();
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * 2. CREATE: Muestra el formulario vacío para crear una nueva noticia
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * 3. STORE: Recibe los datos del formulario 'create' y los guarda en la base de datos
     */
    public function store(Request $request)
    {
        // Validamos que no nos dejen campos importantes en blanco
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:50',
            'extracto' => 'required|string',
            'cuerpo' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Máximo 2MB
        ]);

        $data = $request->all();

        // Si el usuario ha subido una foto, la guardamos en la carpeta 'noticias'
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('noticias', 'public');
            $data['imagen_path'] = $path;
        }

        // Creamos el post en la base de datos
        Post::create($data);

        return redirect()->route('posts.index')->with('success', '¡Noticia publicada con éxito!');
    }

    /**
     * 4. SHOW: Muestra una sola noticia (Opcional en el panel admin, pero buena práctica)
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * 5. EDIT: Muestra el formulario relleno con los datos de una noticia para modificarla
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * 6. UPDATE: Recibe los datos del formulario 'edit' y actualiza la base de datos
     */
    public function update(Request $request, Post $post)
    {
        // Validamos los datos igual que al crear
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:50',
            'extracto' => 'required|string',
            'cuerpo' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        // Si suben una NUEVA imagen, tenemos que borrar la vieja primero
        if ($request->hasFile('imagen')) {
            // Borramos la imagen anterior si existía
            if ($post->imagen_path) {
                Storage::disk('public')->delete($post->imagen_path);
            }
            // Guardamos la nueva imagen
            $path = $request->file('imagen')->store('noticias', 'public');
            $data['imagen_path'] = $path;
        }

        // Actualizamos los datos en la base de datos
        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Noticia actualizada correctamente.');
    }

    /**
     * 7. DESTROY: Elimina una noticia y su imagen del servidor
     */
    public function destroy(Post $post)
    {
        // Antes de borrar la noticia, borramos su foto del disco duro para no ocupar espacio
        if ($post->imagen_path) {
            Storage::disk('public')->delete($post->imagen_path);
        }

        // Borramos el registro de la base de datos
        $post->delete();

        return redirect()->route('posts.index')->with('success', '¡La noticia ha sido eliminada por completo!');
    }
}