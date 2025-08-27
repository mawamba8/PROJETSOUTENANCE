<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        // Formulaire de connexion
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Valide les identifiants
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        // Tentative d’authentification
        if (! auth()->attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => __('Identifiants invalides.'),
            ]);
        }
// Regénère la session et redirige
        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    public function destroy(Request $request)
    {
        // Déconnexion sécurisée
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
protected function authenticated(Request $request, $user)
{
    if ($user->role === 'patient') {
        return redirect()->route('dashboard.patient');
    } elseif ($user->role === 'medecin') {
        return redirect()->route('dashboard.medecin');
    }
    return redirect('/'); // fallback
}




}
