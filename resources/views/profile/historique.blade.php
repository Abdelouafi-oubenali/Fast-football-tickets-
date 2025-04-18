@extends('layouts.main')

@section('title', 'Paiement Réussi')

@section('content')
<div class="bg-gradient-to-b from-blue-50 to-gray-100 min-h-screen py-8 px-4">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8 text-blue-900">Vos billets</h1>
        @foreach($tickets as $match)
        <div class="bg-white p-4 rounded-lg shadow mb-6 max-w-3xl mx-auto"> 
            <h2 class="text-xl font-semibold text-gray-800">Date de réservation: <span class="text-blue-700">{{$match->paid_at}}</span>   — total tickets réservés <span class="text-blue-700">{{$match->quantity}}</span> </h2>
        </div>
        <div class="flex flex-wrap justify-center gap-8">
            <!-- Ticket  -->
            <div class="ticket-fixed-size bg-white rounded-lg shadow-xl overflow-hidden flex border-2 border-blue-200 transition-transform transform hover:scale-[1.01]" style="width: 28cm; height:12cm">
                <div class="p-4 w-2/5 flex flex-col border-r-2 border-blue-200 bg-gradient-to-b from-gray-50 to-blue-50">
                    <div class="text-center mb-4">
                        <h3 class="text-xl font-bold text-blue-800">LIGUE 1</h3>
                        <p class="text-sm text-gray-600">Saison 2024-2025</p>
                    </div>
                    
                    <div class="flex items-center justify-center flex-grow">
                        <div class="flex flex-col items-center space-y-6">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-white rounded-full p-1 shadow-md flex items-center justify-center border-2 border-blue-300">
                                    <img src="{{asset('storage/' . $match->match->homeTeam->logo)}}" alt="Logo PSG" class="rounded-full" />
                                </div>
                                <p class="font-bold mt-2 text-center text-lg">{{$match->match->homeTeam->name}}</p>
                            </div>
                            
                            <div class="text-2xl font-bold text-blue-600">VS</div>                            
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-white rounded-full p-1 shadow-md flex items-center justify-center border-2 border-blue-300">
                                    <img src="{{asset('storage/' . $match->match->awayTeam->logo)}}" alt="Logo Marseille" class="rounded-full" />
                                </div>
                                <p class="font-bold mt-2 text-center text-lg">{{$match->match->awayTeam->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-4 w-3/5 flex flex-col">
                    <div class="border-b-2 border-blue-200 pb-3 mb-3">
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-bold text-blue-800">BILLET OFFICIEL</h2>
                            <div class="text-sm bg-blue-100 text-blue-800 py-1 px-2 rounded-md font-mono">N° TKT-25648</div>
                        </div>
                    </div>
                    
                    <div class="flex flex-grow">
                        <div class="w-3/5 pr-4">
                            <div class="mb-4">
                                <p class="text-xs text-gray-500 uppercase font-semibold">Date et Heure</p>
                                <p class="font-semibold text-lg">1{{$match->match->date}} • {{$match->match->time}}</p>
                            </div>
                            
                            <div class="mb-4">
                                <p class="text-xs text-gray-500 uppercase font-semibold">Stade</p>
                                <p class="font-semibold text-lg">{{$match->match->Stadium}}</p>
                            </div>
                            
                            <div class="mb-4">
                                <p class="text-xs text-gray-500 uppercase font-semibold">Places</p>
                                <p class="font-semibold">Tribune: <span class="text-blue-700">{{$match->category}}</span></p>
                            </div>
                            
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Prix</p>
                                <p class="font-semibold text-lg text-green-700">{{$match->price}} dh </p>
                            </div>
                        </div>
                        
                        <!-- QR Code  -->
                        <div class="w-2/5 flex flex-col items-center justify-center border-l-2 border-blue-200 pl-4">
                            <p class="text-xs text-gray-600 uppercase mb-2 text-center font-semibold">Scannez pour entrer</p>
                            <div id="qrcode1" class="mb-2 border-4 border-blue-200 p-1 rounded"></div>
                            <p class="text-xs text-gray-500 font-mono">#Match: PSG-OM-1506</p>
                        </div>
                    </div>
                    
                    <div class="border-t-2 border-blue-200 pt-3 mt-3">
                        <p class="text-xs text-gray-600 text-center">Ce billet est personnel et ne peut être ni cédé ni revendu. Une pièce d'identité pourra être demandée.</p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    
    </div>
    

    
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .container, .container * {
                visibility: visible;
            }
            .ticket-fixed-size {
                break-inside: avoid;
                margin-bottom: 1cm;
            }
            #printTickets {
                display: none;
            }
        }
    </style>
</div>
@endsection