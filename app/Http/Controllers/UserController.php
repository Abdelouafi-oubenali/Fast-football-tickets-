<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        if (Gate::allows('is-admin') || Gate::allowIf('is-organisateur')) {
            return view('admin.users.index');
        }
        abort(403, 'Accès non autorisé');
    }

    public function manage_users($userRequest, Request $request)
    {
        $search = $request->input('search');
    
        if ($userRequest == 1) {
            if (Gate::allows('is-admin')) {
                $organisateurs = User::whereIn('role', ['organisateur', 'admin']);
                if ($search) {
                    $organisateurs->where('nom', 'like', '%'.$search.'%');
                }
                $organisateurs = $organisateurs->get();
                return view('admin.users.organisateurs.index', compact('organisateurs'));
            } else {
                abort(403, 'Unauthorized action.');
            }
        } else {
            if (Gate::allows('is-admin') || Gate::allows('is-organisateur')) {
                $users = User::where('role', 'client');
                
                if ($search) {
                    $users->where('nom', 'like', '%'.$search.'%');
                }
                
                $users = $users->get();
                return view('admin.users.client.index', compact('users'));
            }   
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function ban_user($user_id)
    {
        $user = User::find($user_id); 
        if (!$user) {
          
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }    
        $user->status = 'banned'; 
        $user->save();
        if($user->role == 'organisateur'){
            return redirect('/manage-users/1')->with('success', 'Utilisateur banni avec succès.');
        }else{
            return redirect('/manage-users/2')->with('success', 'Utilisateur banni avec succès.');
        }
    }
    public function activeUser($user_id)
    {
        $user = User::find($user_id); 
        if (!$user) {
          
            return redirect()->back()->with('error', 'Utilisateur introuvable.');
        }    
        $user->status = 'active'; 
       
        $user->save();
        if($user->role == 'organisateur'){
            return redirect('/manage-users/1')->with('success', 'Utilisateur banni avec succès.');
        }else{
            return redirect('/manage-users/2')->with('success', 'Utilisateur banni avec succès.');
        }
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


    public function show($id)
    {
        abort(404);
    }

}
