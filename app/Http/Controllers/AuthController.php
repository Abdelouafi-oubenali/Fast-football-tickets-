<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    // register form 

       public function ShowRegsterForm(){
        return view('auth.register');
       }

       public function register(RegisterRequest $request){

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Auth::login($user);
        return redirect('/login');

       }

   
}
