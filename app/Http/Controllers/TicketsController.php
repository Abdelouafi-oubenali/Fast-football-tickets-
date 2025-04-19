<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Matchs;

use App\Models\tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMatchsRequest;
use App\Http\Requests\StoreticketsRequest;
use App\Repositories\StadRepositoryInterface;
use App\Repositories\MatchRepositoryInterface;
use App\Repositories\TicketsRepositryIntirface;
use App\Repositories\FootballEqupeRepositoryInterface;

class TicketsController extends Controller
{
    protected $matchRepository;
    protected $stadiumRepository;
    protected $FootballEqupeRepository;

    public function __construct(TicketsRepositryIntirface $matchRepository, StadRepositoryInterface $stadiumRepository, FootballEqupeRepositoryInterface $FootballEqupeRepository) {

        $user = Auth::user(); 
        $chek = $this->checkRoleAdminOrganisater($user->role);
        if($chek){
            abort(403);
        }
        $this->matchRepository = $matchRepository;
        $this->stadiumRepository = $stadiumRepository;
        $this->FootballEqupeRepository = $FootballEqupeRepository;
    }

    public function index()
    {
        $matches = $this->matchRepository->all()->load('homeTeam', 'awayTeam','categories');
        // dd($matches);
        return view('admin.tickets.index', compact('matches'));
    }

    public function create()
    {
        $stades = $this->stadiumRepository->all();
        $equipes = $this->FootballEqupeRepository->all();
        return view('admin.tickets.create',compact('stades','equipes'));
    }

    public function store(StoreticketsRequest $request)
    {
        $data = $request->validated();
        
        // Créer le match
        $match = tickets::create([
            'date' => $data['date'],
            'time' => $data['time'],
            'Stadium' => $data['Stadium'],
            'home_team_id' => $data['home_team_id'],
            'away_team_id' => $data['away_team_id'],
            'home_team_score' => $data['home_team_score'] ?? null,
            'away_team_score' => $data['away_team_score'] ?? null,
        ]);
          
        // Créer les catégories pour ce match
        foreach ($data['categories'] as $categoryData) {
            $match->categories()->create([
                'nom' => $categoryData['nom'],
                'prix' => $categoryData['prix'],
                'actif' => $categoryData['actif'] ?? true,
            ]);
        }
        
        return redirect('tickets')->with('success', 'Match et billets créés avec succès.');
    }

    public function show($id)
    {
        $match = $this->matchRepository->find($id);
        return view('matches.show', compact('match'));
    }

    public function edit($id)
    {
        $ticket = $this->matchRepository->find($id);
        $stades = $this->stadiumRepository->all();
        $equipes = $this->FootballEqupeRepository->all();
        return view('admin.tickets.edit', compact('ticket','stades','equipes'));
    }

    public function update(StoreticketsRequest $request, $id)
    {
        $data = $request->validated();
        $this->matchRepository->update($id, $data);
        return redirect('match')->with('success', 'Le match a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->matchRepository->delete($id);
        return redirect('tickets')->with('success', 'Le match a été supprimé avec succès.');
    }
}
