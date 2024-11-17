<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;

class EmployeeController extends Controller
{
    public function index()
    {
      
                // Gauti visas konferencijas iš duomenų bazės
                $conferences = Conference::all();
        
                // Perduoti konferencijas į vaizdą
                return view('employee.index', compact('conferences'));
    }

    public function show($id)
    {
       
        $conference = Conference::with('users')->findOrFail($id);
        return view('employee.conferences.show', compact('conference'));
    }
}