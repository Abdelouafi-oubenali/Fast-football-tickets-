<?php

namespace App\Http\Controllers;

use App\Models\tickets;
use Illuminate\Http\Request;

class HomController extends Controller
{
    private function getequpe ()
    {

    }
    public function index() 
    {
        $matches = tickets::with(['homeTeam', 'awayTeam'])->take(4)->get();
        return view('index', compact('matches'));
    }
    
}
