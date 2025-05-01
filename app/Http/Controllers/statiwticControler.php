<?php

namespace App\Http\Controllers;

use App\Models\tickets;

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Matchs;
use App\Models\Stades;
use App\Models\Tickets;
use App\Models\TicketsInfo;
use Illuminate\Http\Request;

class statiwticControler extends Controller
{
    public function TotalTickts()
    {
        return Tickets::count(); 
    }

    public function TotalMatchs () 
    {
        return Tickets::count(); 

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
        return TicketsInfo::count();
    }

    public function TotalResrvasionPaid()
    {
        $total = TicketsInfo::where('status', 'paid')->count();
        return $total;
    }
    public function TotalResrvasionPending()
    {
        $total = TicketsInfo::where('status', 'pending')->count();
        return $total;
    }
    
}
