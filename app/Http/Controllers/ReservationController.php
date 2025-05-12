<?php

namespace App\Http\Controllers;

use App\Models\Stades;
use App\Models\matches ;
use App\Models\Category;
use App\Models\Enrollment;
use App\Models\enrollments;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationStore;

class ReservationController extends Controller
{
    public function checkNamberTeckts ($matchId,$quantity , $category ) 
    {
        $categoryInfo = Category::where('match_id', $matchId)
        ->where('nom', $category)
        ->first();

        if($categoryInfo) {
            // dd($categoryInfo->nombre_place - $quantity);
            if($categoryInfo->nombre_place - $quantity < 0)
            {
                // dd()
                return true;
                // return redirect('/reservation/'. $matchId)->with('error', 'Les places ne sont pas disponibles.');
            }else {
                return false;
            }
        }
    }
    public function index($id)
    {
        $match = matches ::with(['homeTeam', 'awayTeam'])->findOrFail($id);
        $stades = Stades::where('name', $match->Stadium)->first();
        $categories = Category::where('match_id', $id)->get();
        $stade = $match->Stadium;
        $stade_image = '';

        if ($stade === ($stades->name ?? '')) {
            $stade_image = $stades->photo;
        }
        return view('resravasion.index', compact('match', 'stade_image', 'categories')); 
    }

    public function show($id)
    {
        $match = matches ::with(['homeTeam', 'awayTeam'])->findOrFail($id);
        $stades = Stades::where('name', $match->Stadium)->first();
        $categories = Category::where('match_id', $id)->get();
        
        $prices = [];
        foreach ($categories as $category) {
            $prices[strtolower(explode(' ', $category->nom)[1])] = $category->prix;
        }
    
        // tribunes

        $tribunes = [
            'nord' => [
                'name' => 'Tribune Nord',
                'categories' => [
                    ['name' => 'Tribune Nord', 'price' => $prices['nord'] ], 
                ],
                'capacity' => $stades->capacity,
                'available' => 1200,
                'advantages' => ['Vue centrale', 'Accès rapide']
            ],
            'sud' => [
                'name' => 'Tribune Sud',
                'categories' => [
                    ['name' => 'Tribune Sud', 'price' => $prices['sud'] ],
                ],
                'capacity' => $stades->capacity,
                'available' => 850,
                'advantages' => ['Vue face à l\'écran géant']
            ],
            'est' => [
                'name' => 'Tribune Est',
                'categories' => [
                    ['name' => 'Tribune Est', 'price' => $prices['est']],
                ],
                'capacity' => $stades->capacity,
                'available' => 1500,
                'advantages' => ['Vue côté soleil couchant']
            ],
            'ouest' => [
                'name' => 'Tribune Ouest',
                'categories' => [
                    ['name' => 'Tribune Ouest', 'price' => $prices['ouest'] ],
                ],
                'capacity' => $stades->capacity,
                'available' => 2000,
                'advantages' => ['Vue côté ombragé']
            ],
            'vip' => [
                'name' => 'Zone VIP',
                'categories' => [
                    ['name' => 'Zone VIP', 'price' => $prices['vip'] ],
                ],
                'capacity' => $stades->capacity,
                'available' => 50,
                'advantages' => [
                    'Accès lounge privé',
                    'Service de restauration',
                    'Parking dédié',
                    'Rencontre avec les joueurs'
                ]
            ]
        ];
        
        return view('resravasion.show', compact('tribunes', 'id'));
    }
    

    
    public function store(ReservationStore $request)
    {
        $match = matches ::with(['homeTeam', 'awayTeam'])->findOrFail($request->match_id);
        $stades = Stades::where('name', $match->Stadium)->first();
    
        $existingReservation = Ticket::where('user_id', Auth::id())
        ->where('match_id', $request->match_id)
        ->first();
    
    if ($existingReservation) {
        return redirect()->back()->with('error', 'Vous avez déjà réservé pour ce match.');
    }

    // function de check number de plass
    if( $this->checkNamberTeckts($request->match_id,$request->quantity,$request->tribune)){
        return redirect()->back()->with('error', 'Les places ne sont pas disponibles.');
    }


    // dd("helow");
    Ticket::create([
        'user_id' => Auth::id() ?? 22, 
        'match_id' => $request->match_id,
        'category' => $request->tribune,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'total_price' => $request->total,
    ]);
    
        $enrollment = Ticket::where('match_id', $request->match_id)->first();
    
        $category = $request->tribune;
        $quantity = $request->quantity;
        $total_price = $request->total;
        $price = $request->price;
    
        return view('resravasion.panier', compact('match', 'stades', 'category', 'quantity', 'total_price', 'price', 'enrollment'));
    }
    

    public function Panier()
    {
        return view('resravasion.panier'); 
    }
}
