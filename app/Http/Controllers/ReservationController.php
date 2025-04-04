<?php

namespace App\Http\Controllers;

use App\Models\Stades;
use App\Models\tickets;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index ($id) 
    {
        $match = tickets::with(['homeTeam', 'awayTeam'])->findOrFail($id);
        $stades = Stades::where('name', $match->Stadium)->get();
        dd($match->Stadium);
        $stade = $match->Stadium;
        
        return view('resravasion.index',compact('match'));
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
