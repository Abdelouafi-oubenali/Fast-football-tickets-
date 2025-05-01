<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\tickets;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateStadesRequest;

class ProfileController extends Controller
{
    public function index($id) 
    {
        $user = User::findOrFail($id);  
        if(Auth::user()->id == $user->id)  {
            return view('profile.index', compact('user'));
        }else{
            abort(403);
        }
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

    public function update(UpdateStadesRequest $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validated();

    if ($request->hasFile('photo')) {
        if ($user->photo && Storage::exists($user->photo)) {
            Storage::delete($user->photo);
        }
        $path = $request->file('photo')->store('profile-photos', 'public');
        $validatedData['photo'] = $path;
    }

    $user->update($validatedData);

    return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
}



    public function historique()
    {
        $user = Auth::user(); 
    
        $tickets = Ticket::with('match')
                    ->where('user_id', $user->id)  
                    ->get();    
        return view('profile.historique', compact('tickets'));
    }
    
}