<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index () 
    {
        return view('resravasion.index');
    }

    public function show ()
    {
        return view('resravasion.show');

    }

    public function Panier () 
    {
        return view('resravasion.panier ');
    }
}
