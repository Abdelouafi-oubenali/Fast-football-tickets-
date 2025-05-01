<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    // register form 

       public function ShowRegsterForm()
       {
        return view('auth.register');
       }

       public function register(RegisterRequest $request)
       {

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Auth::login($user);
        return redirect('/login');

       }

       public function showLoginForm()
       {
           return view('auth.login');
       }

       public function login (LoginRequest $request)
       {

           if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();

            if ($user->status == 'banned') 
            {
                Auth::logout(); 
                return redirect()->route('banned'); 
            }

            $request->session()->regenerate();
        
        
            if ($user->role == 'admin' || $user->role == 'organisateur') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }
        

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas.',
        ]);
       }

       public function logout(Request $request)
       {
           Auth::logout();
           $request->session()->invalidate();
           $request->session()->regenerateToken();
           return redirect('/');
       }

   
}
