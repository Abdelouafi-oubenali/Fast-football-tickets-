@extends('layouts.main')

@section('title', 'Paiement Annulé')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-yellow-100 px-6 py-4 border-b border-yellow-200">
            <div class="flex items-center">
                <svg class="h-8 w-8 text-yellow-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <h1 class="text-xl font-bold text-yellow-800">Paiement Annulé</h1>
            </div>
        </div>
        
        <div class="p-6">
            <div class="mb-6">
                <p class="mb-4">Vous avez annulé votre paiement pour la réservation suivante :</p>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="mb-2"><span class="font-medium">Match:</span> {{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }}</p>
                    <p class="mb-2"><span class="font-medium">Date:</span> {{ $match->date }} à {{ $match->time }}</p>
                    <p class="mb-2"><span class="font-medium">Stade:</span> {{ $match->Stadium }}</p>
                    <p class="mb-2"><span class="font-medium">Tribune:</span> {{ $ticketInfo->category }}</p>
                    <p class="mb-2"><span class="font-medium">Nombre de places:</span> {{ $ticketInfo->quantity }}</p>
                    <p class="mb-2"><span class="font-medium">Montant total:</span> {{ $ticketInfo->totla_price }} DH</p>
                </div>
            </div>
            
            <div class="flex space-x-4">
                <a href="{{ route('resravasion.show', $match->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Choisir d'autres places
                </a>
                <a href="{{ route('home') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection