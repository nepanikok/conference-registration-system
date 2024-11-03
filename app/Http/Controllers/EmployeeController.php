<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
      
        return view('employee.index');
    }

    public function show($id)
    {
       
        return view('employee.conferences.show', compact('id'));
    }
}