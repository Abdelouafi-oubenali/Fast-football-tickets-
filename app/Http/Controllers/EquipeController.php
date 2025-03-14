<?php

namespace App\Http\Controllers;

use App\Models\FootballTeam;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Models\Equipe;
use App\Repositories\FootballEqupeRepositoryInterface;

class EquipeController extends Controller
{
    protected $teamRepository;

    public function __construct(FootballEqupeRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function index()
    {
        $teams = $this->teamRepository->all();
        return view('admin.equipe.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.equipe.create');
    }

    public function store(StoreEquipeRequest $request)
    {
        $data = $request->validated();
        $this->teamRepository->create($data); 

        return redirect('equipe')->with('success', 'Team created successfully.');
    }

    public function edit($id)
    {
        $equipe = $this->teamRepository->find($id);
        return view('admin.equipe.edit', compact('equipe'));
    }

    public function update(StoreEquipeRequest $request, $id)
    {
        $data = $request->validated();
        $this->teamRepository->update($data, $id);
        return redirect('equipe')->with('success', 'Team created successfully.');
    }

    public function destroy($id)
    {
        $this->teamRepository->delete($id);
        return redirect('equipe')->with('success', 'Team deleted successfully.');

    }
}

