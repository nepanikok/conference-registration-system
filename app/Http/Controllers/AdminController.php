<?php

namespace App\Http\Controllers;

use App\Models\Conference; // Importuok modelį
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Gauti visų konferencijų sąrašą
       // $conferences = Conference::all();
       // return view('admin.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.create');
    }




}
