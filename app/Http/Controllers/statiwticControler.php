<?php

namespace App\Http\Controllers;

use App\Models\tickets;

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Matchs;
use App\Models\Stades;
use App\Models\Matches;
use App\Models\Ticket;
use Illuminate\Http\Request;

class statiwticControler extends Controller
{
    public function TotalTickts()
    {
        return Matches::count(); 
    }

    public function TotalMatchs () 
    {
        return Matches::count(); 

    }

    public function TotalStads () 
    {
        return Stades::count(); 

    }
    public function TotalEquipes () 
    {
        return Equipe::count(); 
    }
    public function TotalResrvasion ()
    {
        return Ticket::count();
    }

    public function TotalResrvasionPaid()
    {
        $total = Ticket::where('status', 'paid')->count();
        return $total;
    }
    public function TotalResrvasionPending()
    {
        $total = Ticket::where('status', 'pending')->count();
        return $total;
    }
    
}
