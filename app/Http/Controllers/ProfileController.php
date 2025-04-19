<?php

namespace App\Http\Controllers;

use App\Models\tickets;
use App\Models\User;
use App\Models\TicketsInfo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($id) 
    {
        $user = User::findOrFail($id);    
        return view('profile.index', compact('user'));
    }

    public function mesInformations($id) 
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('home')->with('error', 'Utilisateur non trouvé.');
        }
    
        return view('partials.header', ['user' => $user]);
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);   
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Validation des données
        $validatedData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'number_phone' => ['nullable', 'string', 'max:20'],
            'adresse' => ['nullable', 'string', 'max:255'],
            'About' => ['nullable', 'string', 'max:500'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            // 'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request->photo);


        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }            
            $path = $request->file('photo')->store('profile-photos', 'public');
            $validatedData['photo'] = $path;


        }

        $user->update($validatedData);
  
        return redirect()->route('profile.index', $user->id)
           ->with('success', 'Profil mis à jour avec succès!');
    }


    public function historique()
    {
        $user = Auth::user(); 
    
        $tickets = TicketsInfo::with('match')
                    ->where('user_id', $user->id)  
                    ->get();    
        // dd($tickets);
        return view('profile.historique', compact('tickets'));
    }
    
}