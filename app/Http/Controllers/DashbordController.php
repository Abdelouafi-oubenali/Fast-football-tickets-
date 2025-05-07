<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\statiwticControler;
use App\Models\Ticket;

class DashbordController extends Controller
{
    private $totalTicketsController;
    
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
        
        // les graphiques 
        $statusCounts = Ticket::selectRaw('status, COUNT(*) as count')
        ->groupBy('status')
        ->pluck('count', 'status');

    $donutLabels = ['Résolu', 'En cours', 'En attente', 'Nouveau', 'Fermé'];
    $statusMapping = [
        'resolved' => 0,
        'in_progress' => 1,
        'pending' => 2,
        'new' => 3,
        'closed' => 4
    ];
        
    $donutData = array_fill(0, 5, 0);
    foreach ($statusCounts as $status => $count) {
        if (isset($statusMapping[$status])) {
            $donutData[$statusMapping[$status]] = $count;
        }
    }
    
    $ticketsByDay = Ticket::selectRaw('DAYNAME(created_at) as day, COUNT(*) as count')
    ->groupBy('day')
    ->orderByRaw('FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")')
    ->pluck('count', 'day');
    
    $daysOrder = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $barData = [];
    
    foreach ($daysOrder as $day) {
        $barData[] = $ticketsByDay->get($day, 0);
    }
    // dd($barData);
    
    $chartData = [
        'donut' => [
            'labels' => ['Tickets', 'Matchs', 'Stades', 'Equipes'],
            'data' => [$teckts, $matchs, $Stads, $Equipe],
            'colors' => ['#3B82F6', '#10B981', '#F59E0B', '#6366F1']
        ],
        'bar' => [
            'labels' => ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            'data' => $barData
        ]
    ];
    
    return view('admin.dashboard', compact('matchs', 'teckts', 'Stads', 'Equipe', 'chartData'));
 }

}

