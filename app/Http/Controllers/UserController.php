<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
        return view('admin.users.index');
      
    }

    public function manage_users($userRequest) 
    {
        if ($userRequest == 1) {
            $organisateurs = User::where('role', 'organisateur')->get();
            return view('admin.users.organisateurs.index', compact('organisateurs'));
        } else {
            $users = User::where('role', 'client');
            return view('admin.users.users.index', compact('users'));
        }
    }

    public function ban_user($user_id)
    {
        $user = User::find($user_id); 
         
        if (!$user) {
          
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }    
        $user->status = 'banned'; 
        $user->save();
        return redirect('/manage-users/1')->with('success', 'Utilisateur banni avec succès.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }
    
        $user->delete();
        return redirect('/manage-users/1')->with('success', 'Utilisateur supprimé avec succès.');
    }
    
    
    
}
