<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Validacija
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255', // Pridėkite pavardės validaciją
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    
        // Sukuriamas naudotojas
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name, // Išsaugokite pavardę
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Priskiriamas "kliento" vaidmuo
        $clientRole = Role::where('name', 'klientas')->first();
        $user->roles()->attach($clientRole);
    
        // Prisijungimas po registracijos
        Auth::login($user);
    
        return redirect()->route('welcome');
    }
    



    public function login(Request $request)
    {
        // Validacija
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Prisijungimo bandymas
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Prisijungimas sėkmingas, peradresuojame vartotoją į pagrindinį puslapį
            return redirect()->route('welcome');
        }

        // Jei prisijungimas nepavyksta, grąžiname atgal su klaidos pranešimu
        return back()->withErrors([
            'email' => 'Neteisingi prisijungimo duomenys.',
        ]);
    }




    public function logout(Request $request)
    {
        // Atsijungimas
        Auth::logout();

        // Sesijos sunaikinimas, kad visi duomenys būtų išvalyti
        $request->session()->invalidate();

        // Sukuriama nauja sesija, kad būtų apsaugota nuo CSRF atakų
        $request->session()->regenerateToken();

        // Nukreipimas į pagrindinį puslapį arba prisijungimo puslapį po atsijungimo
        return redirect()->route('welcome');
    }

}
