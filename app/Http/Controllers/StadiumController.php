<?php

namespace App\Http\Controllers;

use App\Models\Stades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreStadesRequest;
use App\Repositories\StadRepositoryInterface;

class StadiumController extends Controller
{
    protected $stadiumRepository;

    public function __construct(StadRepositoryInterface $stadiumRepository)
    {
        $user = Auth::user(); 
        $chek = $this->checkRoleAdmin($user->role);
        if($chek){
            abort(403);
        }
        $this->stadiumRepository = $stadiumRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $stadia = $this->stadiumRepository->search($search);
        } else {
            $stadia = $this->stadiumRepository->all();
        }
        return view('admin.stades.index', compact('stadia'));
    }
    

    public function create()
    {
        return view('admin.stades.create');
    }

    public function store(StoreStadesRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {            
            $logoPath = $request->file('photo')->store('logos', 'public'); 
            $data['photo'] = $logoPath; 
        }
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
        $stadium = Stades::findOrFail($id);
        if ($request->hasFile('photo')) {
            if ($stadium->photo) {
                Storage::disk('public')->delete($stadium->photo);
            }    
            $photoPath = $request->file('photo')->store('stades', 'public');
            $data['photo'] = $photoPath;
        }
        $this->stadiumRepository->update($data, $stadium->id);
    
        return redirect()->route('stades.index')->with('success', 'Stadium updated successfully.');
    }
    
    

    public function destroy($id)
    {
        $this->stadiumRepository->delete($id);
        return redirect()->route('stades.index')->with('success', 'Stadium deleted successfully.');
    }
}