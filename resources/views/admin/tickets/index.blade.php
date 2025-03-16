

@extends('layouts.master')

@section('title','Gestion des tickets')

@section('content')
  <main class="ml-64 pt-20 p-8">
    <!-- Filtres -->
    <div class="container mx-auto px-4 py-6">
        
        <div class="bg-white rounded-lg shadow p-4 flex flex-wrap gap-4">
            <select class="border p-2 rounded-md w-full md:w-auto">
                <option>Tous les mois</option>
                <option>Janvier 2025</option>
                <option>Février 2025</option>
                <option>Mars 2025</option>
            </select>
            <select class="border p-2 rounded-md w-full md:w-auto">
                <option>Toutes équipes</option>
                <option>PSG</option>
                <option>OM</option>
                <option>Lyon</option>
            </select>
            <select class="border p-2 rounded-md w-full md:w-auto">
                <option>Prix croissant</option>
                <option>Prix décroissant</option>
                <option>Date</option>
            </select>
            <a href="/tickets/create" class="bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-lg shadow-lg transition-colors duration-200 flex items-center gap-2 w-full md:w-auto justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter un tickets
        </a>
        </div>
    
    </div>

    <!-- Liste des matchs -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Match 1 -->
            @forEach($matches as $match)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-blue-50 p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-blue-800 font-semibold">Ligue 1</span>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Places disponibles</span>
                    </div>
                    <div class="text-center space-y-2">
                        <p class="text-gray-500">{{$match->date}} {{$match->time}}</p>
                        <div class="flex justify-center items-center gap-4">
                            <div class="text-center">
                                <p class="font-bold text-xl">{{$match->homeTeam->name}}</p>
                                <img src="/api/placeholder/50/50" alt="PSG" class="mx-auto"/>
                            </div>
                            <div class="text-2xl font-bold">VS</div>
                            <div class="text-center">
                                <p class="font-bold text-xl"> {{$match->awayTeam->name}}    </p>
                                <img src="/api/placeholder/50/50" alt="OM" class="mx-auto"/>
                            </div>
                        </div>
                        <p class="font-medium">Parc des Princes</p>
                    </div>
                </div>
                <div class="p-4 space-y-4">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="font-medium">VIP</span>
                            <div class="text-right">
                                <p class="font-bold text-lg">250 €</p>
                                <p class="text-sm text-green-600">12 places restantes</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium">Tribune</span>
                            <div class="text-right">
                                <p class="font-bold text-lg">80 €</p>
                                <p class="text-sm text-amber-600">45 places restantes</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium">Pelouse</span>
                            <div class="text-right">
                                <p class="font-bold text-lg">40 €</p>
                                <p class="text-sm text-red-600">Complet</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                    <a href="../tickets/{{ $match->id }}/edit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 text-center block flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{route('tickets.destroy',$match->id)}}" method="POST">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" href="#" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 text-center block flex items-center justify-center w-[5rem]" style="width: 5rem">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                   
                    <a href="#" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 text-center block flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                </div>

                </div>
            </div>
          @endforeach
            <!-- Match 2 -->
            {{-- <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-blue-50 p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-blue-800 font-semibold">Ligue 1</span>
                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Presque complet</span>
                    </div>
                    <div class="text-center space-y-2">
                        <p class="text-gray-500">20 Février 2025 - 19:00</p>
                        <div class="flex justify-center items-center gap-4">
                            <div class="text-center">
                                <p class="font-bold text-xl">Lyon</p>
                                <img src="/api/placeholder/50/50" alt="Lyon" class="mx-auto"/>
                            </div>
                            <div class="text-2xl font-bold">VS</div>
                            <div class="text-center">
                                <p class="font-bold text-xl">Nice</p>
                                <img src="/api/placeholder/50/50" alt="Nice" class="mx-auto"/>
                            </div>
                        </div>
                        <p class="font-medium">Groupama Stadium</p>
                    </div>
                </div>
                <div class="p-4 space-y-4">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="font-medium">VIP</span>
                            <div class="text-right">
                                <p class="font-bold text-lg">200 €</p>
                                <p class="text-sm text-amber-600">5 places restantes</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium">Tribune</span>
                            <div class="text-right">
                                <p class="font-bold text-lg">60 €</p>
                                <p class="text-sm text-red-600">Complet</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium">Pelouse</span>
                            <div class="text-right">
                                <p class="font-bold text-lg">30 €</p>
                                <p class="text-sm text-red-600">Complet</p>
                            </div>
                        </div>
                    </div>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                        Réserver maintenant
                    </button>
                </div>
            </div> --}}
        </div>
    </div>
  </main>
  @endsection
