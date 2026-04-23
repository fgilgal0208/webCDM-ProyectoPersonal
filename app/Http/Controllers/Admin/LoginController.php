<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 1. Muestra la vista con el formulario de candado
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // 2. Comprueba las credenciales
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Si acierta, lo mandamos al panel
            return redirect()->intended('/admin/dashboard');
        }

        // Si falla, lo devolvemos con un error
        return back()->withErrors([
            'username' => 'El usuario o la contraseña son incorrectos.',
        ]);
    }

    // 3. Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}