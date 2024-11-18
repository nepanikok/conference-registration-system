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
      
        $user = Auth::check() ? Auth::user() : null;
    
     
        $conferences = Conference::all();
    
       
        if ($user) {
           
            $userConferences = $user->conferences;  
        } else {
            $userConferences = [];
        }
    
      
        return view('client.index', compact('conferences', 'userConferences'));
    }

    public function show($id)
    {
        
        $conference = Conference::find($id);
    
        if (!$conference) {
            return redirect()->route('conferences.index')->with('error', 'Konferencija nerasta.');
        }
        $isRegistered = false;
    if (Auth::check()) {
        $isRegistered = DB::table('users_conferences')
            ->where('user_id', Auth::id())
            ->where('conference_id', $id)
            ->exists();
    }
       
        return view('client.show', compact('conference', 'isRegistered'));
    }
    
    

    public function registerForConference(Request $request, $conferenceId)
    {
     
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Norėdami užsiregistruoti, turite prisijungti.');
        }
    
    
        $user = Auth::user();
    
       
        $existingRegistration = DB::table('users_conferences')
            ->where('user_id', $user->id)
            ->where('conference_id', $conferenceId)
            ->exists();
    
        if ($existingRegistration) {
            return redirect()->route('conferences.index')->with('error', 'Jūs jau esate užsiregistravę šiai konferencijai.');
        }
    
      
        DB::table('users_conferences')->insert([
            'user_id' => $user->id,
            'conference_id' => $conferenceId,
        ]);
    
        return redirect()->route('client.index')->with('success', 'Jūs sėkmingai užsiregistravote konferencijai!');
    }
    
    

}
