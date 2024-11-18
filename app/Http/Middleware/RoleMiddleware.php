<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Patikrina, ar vartotojas prisijungęs
        if (!Auth::check()) {
            return redirect()->route('login.form'); // Arba naudokite kitą tinkamą peradresavimą
        }

        // Gaukite prisijungusį vartotoją
        $user = Auth::user();

        // Patikrina, ar vartotojas turi reikiamą rolę
        if (!$user->roles->contains('name', $role)) {
            abort(403, 'Neturite teisės pasiekti šio puslapio.');
        }

        return $next($request);
    }
}
