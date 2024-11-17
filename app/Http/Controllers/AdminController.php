<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conference;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); 
    }
    public function indexUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users')); 
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id); // Surandame naudotoją pagal ID
        return view('admin.users.edit', compact('user')); 
    }

    public function updateUser(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Unikalus el. pašto adresas, išskyrus dabartinį naudotoją
        ]);
    
        $user = User::findOrFail($id); // Surandame naudotoją pagal ID
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->save(); // Išsaugome atnaujintus duomenis
    
        return redirect()->route('admin.users.index')->with('success', 'Naudotojo duomenys atnaujinti sėkmingai!');
    }

    public function indexConferences()
    {
        $conferences = Conference::all(); // Paimame visas konferencijas
        return view('admin.conferences.index', compact('conferences'));
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
        $conference = Conference::findOrFail($id); // Pažymėta pagal ID
    return view('admin.conferences.edit', compact('conference'));
    }

    public function updateConference(Request $request, $id)
    {
       // dd($request->all()); // Patikrinkite, kokius duomenis gaunate iš formos
    
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'speakers' => 'required|string',
            'date' => 'required|date',
            'address' => 'required|string|max:255',
        ]);
        
        $conference = Conference::findOrFail($id);
        $conference->title = $request->title;
        $conference->description = $request->description;
        $conference->speakers = $request->speakers;
        $conference->date = $request->date;
        $conference->address = $request->address;
    
        // Išsaugome pakeitimus
        $conference->save();
    
        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sėkmingai atnaujinta');
    }
    
    

    public function deleteConference($id)
    {
      
        $conference = Conference::findOrFail($id);
        $conference->delete();
    
        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija ištrinta sėkmingai.');
    }
}