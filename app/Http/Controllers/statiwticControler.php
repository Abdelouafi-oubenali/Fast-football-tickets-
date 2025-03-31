<?php

namespace App\Http\Controllers;

use App\Models\tickets;

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Matchs;
use App\Models\Stades;
use App\Models\Tickets;
use Illuminate\Http\Request;

class statiwticControler extends Controller
{
    public function TotalTickts()
    {
        return Tickets::count(); 
    }

    public function TotalMatchs () 
    {
        return Matchs::count(); 

    }

    public function TotalStads () 
    {
        return Stades::count(); 

    }
    public function TotalEquipes () 
    {
        return Equipe::count(); 

    }
}
