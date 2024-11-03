<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Laikinai grąžina konferencijų sąrašo šabloną
        return view('employee.index');
    }

    public function show($id)
    {
        // Laikinai grąžina konferencijos peržiūros šabloną
        return view('employee.conferences.show', compact('id'));
    }
}