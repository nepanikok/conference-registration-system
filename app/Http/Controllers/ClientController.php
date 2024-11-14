<?php

namespace App\Http\Controllers;
use App\Models\Conference;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('client.index', compact('conferences')); 
    }
}
