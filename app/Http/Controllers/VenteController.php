<?php

namespace App\Http\Controllers;

use App\Models\TicketsInfo;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index () 
    {
       $ventes = TicketsInfo::with('match','user')
       ->get();    
       return view('admin.vente-de-tickets', compact('ventes'));

    }
}
