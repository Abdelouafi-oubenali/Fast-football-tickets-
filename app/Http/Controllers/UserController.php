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
    
}
