<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\statiwticControler;

class DashbordController extends Controller
{
    private $totalTicketsController ;
    
    public function __construct()
    {
        $this->totalTicketsController = new statiwticControler(); 


    }

    public function show()
    {
        $teckts = $this->totalTicketsController->TotalTickts(); 
        $matchs = $this->totalTicketsController->TotalMatchs(); 
        $Stads = $this->totalTicketsController->TotalStads();
        $Equipe = $this->totalTicketsController->TotalStads(); 


        return view('admin.dashboard', compact('matchs','teckts','Stads','Equipe'));
    }
}

