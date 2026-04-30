<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class PostController extends Controller
{
    /**
     * Muestra la lista de noticias en el panel admin.
     */
    public function index()
    {
        $posts = Post::orderBy('fecha_publicacion', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Muestra el formulario para crear una nueva noticia.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Guarda la nueva noticia y optimiza la imagen.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'extracto' => 'required|string|max:500',
            'cuerpo' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // Máx 5MB de subida inicial
        ]);

        $data = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            
            // 1. Nombre único para evitar que se sobrescriban
            $nombreImagen = Str::slug($request->titulo) . '-' . time() . '.' . $imagen->getClientOriginalExtension();
            
            // 2. Comprobar si existe la carpeta
            $carpeta = storage_path('app/public/noticias');
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0755, true);
            }

            // 3. Procesar y optimizar con Intervention Image
            $rutaDestino = $carpeta . '/' . $nombreImagen;
            $img = Image::read($imagen->getRealPath());
            $img->cover(800, 600); // Recorta al centro dejándola de 800x600 px exactos
            $img->save($rutaDestino, 80); // Guarda al 80% de calidad

            // 4. Guardar la ruta en el array de base de datos
            $data['imagen_path'] = 'noticias/' . $nombreImagen;
        }

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Noticia creada y optimizada correctamente.');
    }

    /**
     * Muestra el formulario para editar una noticia.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Actualiza la noticia. Si hay foto nueva, optimiza y borra la vieja.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'extracto' => 'required|string|max:500',
            'cuerpo' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            // A) Borrar la imagen anterior del disco duro para no gastar espacio
            if ($post->imagen_path && Storage::disk('public')->exists($post->imagen_path)) {
                Storage::disk('public')->delete($post->imagen_path);
            }

            // B) Procesar la nueva imagen
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->titulo) . '-' . time() . '.' . $imagen->getClientOriginalExtension();
            
            $carpeta = storage_path('app/public/noticias');
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0755, true);
            }

            $rutaDestino = $carpeta . '/' . $nombreImagen;
            $img = Image::read($imagen->getRealPath());
            $img->cover(800, 600);
            $img->save($rutaDestino, 80);

            $data['imagen_path'] = 'noticias/' . $nombreImagen;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Noticia actualizada correctamente.');
    }

    /**
     * Elimina la noticia y su foto asociada del disco.
     */
    public function destroy(Post $post)
    {
        // Borrar la imagen asociada si existe
        if ($post->imagen_path && Storage::disk('public')->exists($post->imagen_path)) {
            Storage::disk('public')->delete($post->imagen_path);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Noticia eliminada correctamente.');
    }
}