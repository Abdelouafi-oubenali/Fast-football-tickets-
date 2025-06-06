<?php

namespace App\Http\Controllers;

use App\Models\Stades;
use App\Models\Matches;
use Illuminate\Http\Request;

class HomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = Matches::with(['homeTeam', 'awayTeam']);
     
        $query = Matches::with(['homeTeam', 'awayTeam'])
        ->whereDate('date', '=', now()->toDateString());
    
    
        if ($search) {
            $query->whereHas('homeTeam', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('awayTeam', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }
        $matches = $query->take(4)->get();
        $allMatchesSearch = $query->get();
        $TopStads = Stades::limit(4)->get();

        $allMatches = Matches::with(['homeTeam', 'awayTeam'])
        ->whereDate('date', '>=', now()->toDateString())
        ->get();
    
        // dd($matches) ;  
        return view('index', compact('matches', 'allMatchesSearch','allMatches','search','TopStads'));
    }
    
    
}






