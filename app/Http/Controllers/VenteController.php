<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\statiwticControler;

class VenteController extends Controller
{
    private $totalTeckts ;

    public function __construct()
    {
        $this->totalTeckts = new statiwticControler();
    }
    public function index(Request $request)
    {
        $TotalResrvasion = $this->totalTeckts->TotalResrvasion();
        $TotalResrvasionPaid = $this->totalTeckts->TotalResrvasionPaid();
        $TotalResrvasionPending = $this->totalTeckts->TotalResrvasionPending();
        $TotalTickts = $this->totalTeckts->TotalTickts();
        
 
        $query = Ticket::with('match', 'user');
    
        if ($request->filled('match_id') && $request->match_id !== 'all') {
            $query->where('match_id', $request->match_id);
        }
    
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }
    
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
    
    
        $ventes = $query->latest()->get();
    
        $matches = Matches::with(['homeTeam','awayTeam'])->get();
    
        return view('admin.vente-de-tickets', compact(
            'ventes',
            'TotalResrvasion',
            'TotalResrvasionPaid',
            'TotalResrvasionPending',
            'TotalTickts',
            'matches'
        ));
    }
    
}
