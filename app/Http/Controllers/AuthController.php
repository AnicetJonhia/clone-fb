<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'Email' => 'required|email|unique:membres',
            'Motdepasse' => 'required|min:6',
            'Nom' => 'required|string',
            'DateNaissance' => 'required|date',
        ]);

        $membre = Membre::create([
            'Email' => $request->Email,
            'Motdepasse' => Hash::make($request->Motdepasse),
            'Nom' => $request->Nom,
            'DateNaissance' => $request->DateNaissance,
        ]);

        Auth::login($membre);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Motdepasse' => 'required',
        ]);

        if (Auth::attempt(['Email' => $request->Email, 'password' => $request->Motdepasse])) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'Email' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
