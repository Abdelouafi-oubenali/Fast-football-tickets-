<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StadRepositoryInterface;

class StadiumController extends Controller
{
    protected $stadiumRepository;

    public function __construct(StadRepositoryInterface $stadiumRepository)
    {
        $this->stadiumRepository = $stadiumRepository;
    }

    public function index()
    {
        $stadia = $this->stadiumRepository->all();
        return view('admin.stades.index', compact('stadia'));
    }

    public function create()
    {
        return view('admin.stades.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:255'
        ]);

        $this->stadiumRepository->create($data);
        return redirect()->route('stadia.index')->with('success', 'Stadium created successfully.');
    }

    public function show($id)
    {
        $stadium = $this->stadiumRepository->find($id);
        return view('stadia.show', compact('stadium'));
    }

    public function edit($id)
    {
        $stadium = $this->stadiumRepository->find($id);
        return view('stadia.edit', compact('stadium'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'location' => 'required|string|max:255',
        ]);

        $this->stadiumRepository->update($id, $data);
        return redirect()->route('stadia.index')->with('success', 'Stadium updated successfully.');
    }

    public function destroy($id)
    {
        $this->stadiumRepository->delete($id);
        return redirect()->route('stadia.index')->with('success', 'Stadium deleted successfully.');
    }
}