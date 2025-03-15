<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStadesRequest;
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

    public function store(StoreStadesRequest $request)
    {
        $data = $request->validated();
        $this->stadiumRepository->create($data);
        return redirect()->route('stades.index')->with('success', 'Stadium created successfully.');
    }

    public function show($id)
    {
        $stadium = $this->stadiumRepository->find($id);
        return view('stades.show', compact('stadium'));
    }

    public function edit($id)
    {
        $stadium = $this->stadiumRepository->find($id);
        return view('admin.stades.edit', compact('stadium'));
    }

        public function update(StoreStadesRequest $request, $id)
    {
        $data = $request->validated();
        $this->stadiumRepository->update($data, $id);

        return redirect()->route('stades.index')->with('success', 'Stadium updated successfully.');
    }
    

    public function destroy($id)
    {
        $this->stadiumRepository->delete($id);
        return redirect()->route('stades.index')->with('success', 'Stadium deleted successfully.');
    }
}