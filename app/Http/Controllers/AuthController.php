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
       
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    
       
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
      
        $clientRole = Role::where('name', 'klientas')->first();
        $user->roles()->attach($clientRole);
    
        
        Auth::login($user);
    
        return redirect()->route('welcome');
    }
    



    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          
            return redirect()->route('welcome');
        }

      
        return back()->withErrors([
            'email' => 'Neteisingi prisijungimo duomenys.',
        ]);
    }




    public function logout(Request $request)
    {
       
        Auth::logout();

       
        $request->session()->invalidate();

       
        $request->session()->regenerateToken();

       
        return redirect()->route('welcome');
    }

}
