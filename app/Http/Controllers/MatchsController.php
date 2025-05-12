<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMatchsRequest;

use App\Repositories\StadRepositoryInterface;
use App\Repositories\MatchRepositoryInterface;
use App\Repositories\FootballEqupeRepositoryInterface;

class MatchsController extends Controller
{
    protected $matchRepository;
    protected $stadiumRepository;
    protected $FootballEqupeRepository;

    public function __construct(MatchRepositoryInterface $matchRepository, StadRepositoryInterface $stadiumRepository, FootballEqupeRepositoryInterface $FootballEqupeRepository) {
        $this->matchRepository = $matchRepository;
        $this->stadiumRepository = $stadiumRepository;
        $this->FootballEqupeRepository = $FootballEqupeRepository;
    }

    public function index()
    {
        $matches = $this->matchRepository->all()->load('homeTeam', 'awayTeam');
        return view('admin.matchs.index', compact('matches'));
    }

    public function create()
    {
        $stades = $this->stadiumRepository->all();
        $equipes = $this->FootballEqupeRepository->all();
        return view('admin.matchs.create',compact('stades','equipes'));
    }

    public function store(StoreMatchsRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $this->matchRepository->create($data);
        return redirect('match')->with('success', 'Le match a été créé avec succès.');
    }

    public function show($id)
    {
        $match = $this->matchRepository->find($id);
        return view('matches.show', compact('match'));
    }

    public function edit($id)
    {
        $match = $this->matchRepository->find($id);
        $stades = $this->stadiumRepository->all();
        $equipes = $this->FootballEqupeRepository->all();
        return view('admin.matchs.edit', compact('match','stades','equipes'));
    }

    public function update(StoreMatchsRequest $request, $id)
    {
        $data = $request->validated();
        $this->matchRepository->update($id, $data);
        return redirect('match')->with('success', 'Le match a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $this->matchRepository->delete($id);
        return redirect('match')->with('success', 'Le match a été supprimé avec succès.');
    }
}
