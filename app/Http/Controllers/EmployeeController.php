<?php

namespace App\Http\Controllers;

use App\Models\Conference; // Importuok modelį
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Gauti visų konferencijų sąrašą
        $conferences = Conference::all();
        return view('employee.index', compact('conferences'));
    }

    public function show($id)
    {
        // Rasti konkrečią konferenciją
        $conference = Conference::findOrFail($id);
        $participants = $conference->participants; // Jei turi santykį su dalyviais
        return view('employee.show', compact('conference', 'participants'));
    }
}