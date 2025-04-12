<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stades;
use App\Models\tickets;


class ReservationController extends Controller
{
    public function index($id)
    {
        $match = tickets::with(['homeTeam', 'awayTeam'])->findOrFail($id);
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
        $match = tickets::with(['homeTeam', 'awayTeam'])->findOrFail($id);
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
                    ['name' => 'prix', 'price' => $prices['nord'] ], 
                ],
                'capacity' => $stades->capacity,
                'available' => 1200,
                'advantages' => ['Vue centrale', 'Accès rapide']
            ],
            'sud' => [
                'name' => 'Tribune Sud',
                'categories' => [
                    ['name' => 'price', 'price' => $prices['sud'] ],
                ],
                'capacity' => $stades->capacity,
                'available' => 850,
                'advantages' => ['Vue face à l\'écran géant']
            ],
            'est' => [
                'name' => 'Tribune Est',
                'categories' => [
                    ['name' => 'price', 'price' => $prices['est']],
                ],
                'capacity' => $stades->capacity,
                'available' => 1500,
                'advantages' => ['Vue côté soleil couchant']
            ],
            'ouest' => [
                'name' => 'Tribune Ouest',
                'categories' => [
                    ['name' => 'Standard', 'price' => $prices['ouest'] ],
                ],
                'capacity' => $stades->capacity,
                'available' => 2000,
                'advantages' => ['Vue côté ombragé']
            ],
            'vip' => [
                'name' => 'Zone VIP',
                'categories' => [
                    ['name' => 'VIP price', 'price' => $prices['vip'] ],
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
    
        // Retourner la vue avec les données
        return view('resravasion.show', compact('tribunes'));
    }
    


    public function Panier()
    {
        return view('reservation.panier'); 
    }
}
