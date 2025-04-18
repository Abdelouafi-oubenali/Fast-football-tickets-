<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\statiwticControler;

class DashbordController extends Controller
{
    private $totalTicketsController ;
    
    public function __construct()
    {
        $user = Auth::user(); 
        $chek = $this->checkRoleAdminOrganisater($user->role);
        if($chek){
            abort(403);
        }
        $this->totalTicketsController = new statiwticControler(); 
    }

    public function index()
    {
        $teckts = $this->totalTicketsController->TotalTickts(); 
        $matchs = $this->totalTicketsController->TotalMatchs(); 
        $Stads = $this->totalTicketsController->TotalStads();
        $Equipe = $this->totalTicketsController->TotalStads(); 
        
        return view('admin.dashboard', compact('matchs','teckts','Stads','Equipe'));
    }
}

