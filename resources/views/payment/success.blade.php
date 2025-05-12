@extends('layouts.main')

@section('title', 'Paiement Réussi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-100 px-6 py-4 border-b border-green-200">
            <div class="flex items-center">
                <svg class="h-8 w-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <h1 class="text-xl font-bold text-green-800">Paiement Réussi!</h1>
            </div>
        </div>
        
        <div class="p-6">
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-2">Détails de votre réservation</h2>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="mb-2"><span class="font-medium">Match:</span> {{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }}</p>
                    <p class="mb-2"><span class="font-medium">Date:</span> {{ $match->date }} à {{ $match->time }}</p>
                    <p class="mb-2"><span class="font-medium">Stade:</span> {{ $match->Stadium }}</p>
                    <p class="mb-2"><span class="font-medium">Tribune:</span> {{ $ticketInfo->category }}</p>
                    <p class="mb-2"><span class="font-medium">Nombre de places:</span> {{ $ticketInfo->quantity }}</p>
                    <p class="mb-2"><span class="font-medium">Montant total:</span> {{ $ticketInfo->total_price }} DH</p>
                </div>
            </div>
            
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            Vos billets vous ont été envoyés par email. Vous pouvez également les télécharger via le bouton ci-dessous.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('tickets.download', $ticketInfo->id) }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Télécharger le billet PDF
                </a>
                
                <a href="{{ route('home') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection