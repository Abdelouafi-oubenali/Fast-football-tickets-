<?php

namespace App\Http\Controllers;

use App\Models\TicketsInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\statiwticControler;

class VenteController extends Controller
{
    private $totalTeckts ;

    public function __construct()
    {
        $this->totalTeckts = new statiwticControler();
    }
    public function index () 
    {
        $TotalResrvasion = $this->totalTeckts->TotalResrvasion();
        $TotalResrvasionPaid = $this->totalTeckts->TotalResrvasionPaid();
        $TotalResrvasionPending = $this->totalTeckts->TotalResrvasionPending();
        $TotalTickts = $this->totalTeckts->TotalTickts();

       $ventes = TicketsInfo::with('match','user')
       ->get();    
       return view('admin.vente-de-tickets', compact('ventes','TotalResrvasion','TotalResrvasionPaid','TotalResrvasionPending','TotalTickts'));
    }
}
