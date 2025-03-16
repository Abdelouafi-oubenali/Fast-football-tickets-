<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->matchRepository = $matchRepository;
        $this->stadiumRepository = $stadiumRepository;
        $this->FootballEqupeRepository = $FootballEqupeRepository;
    }

    public function index()
    {
        $matches = $this->matchRepository->all()->load('homeTeam', 'awayTeam');
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
        // dd($data);
        $this->matchRepository->create($data);
        return redirect('tickets')->with('success', 'Le match a été créé avec succès.');
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
