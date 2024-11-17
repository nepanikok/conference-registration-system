<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('conferences.index', compact('conferences'));
    }
    public function show($id)
    {
        // Rasti konferenciją pagal ID
        $conference = Conference::findOrFail($id);
        $isRegistered = false;
        if (Auth::check()) {
            $isRegistered = DB::table('users_conferences')
                ->where('user_id', Auth::id())
                ->where('conference_id', $id)
                ->exists();
        }
        // Perduoti konferenciją į peržiūros puslapį
        return view('conferences.show', compact('conference', 'isRegistered'));
    }
    
    public function create()
    {
        return view('conferences.create');
    }

    public function store(Request $request)
    {
        // Validuojame formos duomenis
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'speakers' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

        // Išsaugome naują konferenciją į duomenų bazę
        Conference::create([
            'title' => $request->title,
            'description' => $request->description,
            'speakers' => $request->speakers,
            'date' => $request->date,
            'address' => $request->address,
        ]);

        // Nukreipiame atgal į konferencijų sąrašą arba kitą puslapį
        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai sukurta.');
    }
}