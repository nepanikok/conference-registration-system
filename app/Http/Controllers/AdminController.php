<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); 
    }
    public function indexUsers()
    {
        return view('admin.users.index'); 
    }

    public function editUser($id)
    {
        return view('admin.users.edit', compact('id')); 
    }

    public function updateUser(Request $request, $id)
    {
       
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

      

        return redirect()->route('admin.users.index')->with('success', 'Vartotojas atnaujintas sėkmingai.');
    }

    public function indexConferences()
    {
        return view('admin.conferences.index'); 
    }

    public function createConference()
    {
        return view('admin.conferences.create'); 
    }

    public function storeConference(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'speakers' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required',
        ]);

        

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sukurta sėkmingai.');
    }

    public function editConference($id)
    {
        return view('admin.conferences.edit', compact('id')); 
    }

    public function updateConference(Request $request, $id)
    {
      
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'speakers' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required',
        ]);

        

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija atnaujinta sėkmingai.');
    }

    public function deleteConference($id)
    {
      
        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija ištrinta sėkmingai.');
    }
}