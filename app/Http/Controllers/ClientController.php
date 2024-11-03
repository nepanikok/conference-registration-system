<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference; // Nepamiršk importuoti modelio

class ClientController extends Controller
{
    public function index()
    {
        // Gauti visus konferencijų įrašus
        $conferences = Conference::all();
        return view('client.index', compact('conferences'));
    }

    public function show($id)
    {
        // Rasti konkrečią konferenciją pagal ID
        $conference = Conference::findOrFail($id);
        return view('client.show', compact('conference'));
    }

    public function register(Request $request)
    {
        // Registruoti klientą į konferenciją
        // Čia pridėk savo registracijos logiką
    }
}
