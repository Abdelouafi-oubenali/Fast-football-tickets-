<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function index($id) 
    {
        $user = User::findOrFail($id);    
        return view('profil.index', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);   
        return view('profil.edit', compact('user'));
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
}