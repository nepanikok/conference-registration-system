<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        // Patikrinti, ar naudotojas prisijungęs
        $user = Auth::check() ? Auth::user() : null;
    
        // Gauti visas konferencijas iš duomenų bazės
        $conferences = Conference::all();
    
        // Jei naudotojas prisijungęs, užkrauti konferencijas
        if ($user) {
            // Užkrauti naudotojo konferencijas užklausos metu (eager loading)
            $userConferences = $user->conferences;  // Eager load conferences
        } else {
            $userConferences = [];
        }
    
        // Perduoti konferencijas ir naudotojo konferencijas į vaizdą
        return view('client.index', compact('conferences', 'userConferences'));
    }

    public function show($id)
    {
        // Patikrinti, ar konferencija egzistuoja
        $conference = Conference::find($id);
    
        if (!$conference) {
            return redirect()->route('conferences.index')->with('error', 'Konferencija nerasta.');
        }
    
        // Perduoti konferenciją į peržiūros puslapį
        return view('client.show', compact('conference'));
    }
    
    

    public function registerForConference(Request $request, $conferenceId)
    {
        // Patikrinti, ar naudotojas prisijungęs
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Norėdami užsiregistruoti, turite prisijungti.');
        }
    
        // Gauti prisijungusį naudotoją
        $user = Auth::user();
    
        // Patikrinti, ar naudotojas jau užsiregistravęs į šią konferenciją
        $existingRegistration = DB::table('users_conferences')
            ->where('user_id', $user->id)
            ->where('conference_id', $conferenceId)
            ->exists();
    
        if ($existingRegistration) {
            return redirect()->route('conferences.index')->with('error', 'Jūs jau esate užsiregistravę šiai konferencijai.');
        }
    
        // Užregistruoti naudotoją į konferenciją įrašant į `users_conferences` lentelę
        DB::table('users_conferences')->insert([
            'user_id' => $user->id,
            'conference_id' => $conferenceId,
        ]);
    
        return redirect()->route('client.index')->with('success', 'Jūs sėkmingai užsiregistravote konferencijai!');
    }
    
    

}
