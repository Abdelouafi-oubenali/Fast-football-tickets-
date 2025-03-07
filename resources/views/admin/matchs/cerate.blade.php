@extends('layouts.master')

@section('title','Création de Match')

@section('content')

<div class="p-8 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-lg ml-64 max-w-6xl">
    <div class="flex items-center mb-8 border-b border-green-200 pb-4">
        <div class="bg-green-600 p-3 rounded-lg shadow-md mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-green-800">Créer un Nouveau Match</h1>
    </div>
    
    <form action="{{ route('match.store') }}" method="POST" class="space-y-8">
        @csrf
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-green-700 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Informations Générales
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Équipe domicile -->
                <div>
                    <label for="equipe_domicile" class="block text-sm font-medium text-gray-700 mb-1">Équipe Domicile</label>
                    <select id="equipe_domicile" name="equipe_domicile_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="">Sélectionner une équipe</option>
                        {{-- @foreach($equipes as $equipe)
                            <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                        @endforeach --}}
                    </select>
                    @error('equipe_domicile_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Équipe extérieur -->
                <div>
                    <label for="equipe_exterieur" class="block text-sm font-medium text-gray-700 mb-1">Équipe Extérieur</label>
                    <select id="equipe_exterieur" name="equipe_exterieur_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="">Sélectionner une équipe</option>
                        {{-- @foreach($equipes as $equipe)
                            <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                        @endforeach --}}
                    </select>
                    @error('equipe_exterieur_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Stade -->
                <div>
                    <label for="stade" class="block text-sm font-medium text-gray-700 mb-1">Stade</label>
                    <select id="stade" name="stade_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="">Sélectionner un stade</option>
                        {{-- @foreach($stades as $stade)
                            <option value="{{ $stade->id }}">{{ $stade->nom }} ({{ $stade->ville }})</option>
                        @endforeach --}}
                    </select>
                    @error('stade_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Compétition -->
                <div>
                    <label for="competition" class="block text-sm font-medium text-gray-700 mb-1">Compétition</label>
                    <select id="competition" name="competition" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                        <option value="">Sélectionner une compétition</option>
                        <option value="Ligue 1">Ligue 1</option>
                        <option value="Coupe de France">Coupe de France</option>
                        <option value="Champions League">Champions League</option>
                        <option value="Europa League">Europa League</option>
                        <option value="Amical">Match Amical</option>
                    </select>
                    @error('competition')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-green-700 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Date et Heure
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Date du match -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date du Match</label>
                    <input type="date" id="date" name="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                    @error('date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Heure du match -->
                <div>
                    <label for="heure" class="block text-sm font-medium text-gray-700 mb-1">Heure du Match</label>
                    <input type="time" id="heure" name="heure" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                    @error('heure')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Prix des billets -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-green-700 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Tarification des Billets
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-green-50 p-4 rounded-lg">
                    <h3 class="text-md font-medium text-green-800 mb-2">Catégorie 1 (Premium)</h3>
                    <label for="prix_categorie_1" class="block text-sm font-medium text-gray-700 mb-1">Prix</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">€</span>
                        </div>
                        <input type="number" step="0.01" id="prix_categorie_1" name="prix_categorie_1" class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="0.00">
                    </div>
                    @error('prix_categorie_1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <label for="billets_categorie_1" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Nombre de Billets</label>
                    <input type="number" id="billets_categorie_1" name="billets_categorie_1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                    @error('billets_categorie_1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="bg-green-50 p-4 rounded-lg">
                    <h3 class="text-md font-medium text-green-800 mb-2">Catégorie 2 (Standard)</h3>
                    <label for="prix_categorie_2" class="block text-sm font-medium text-gray-700 mb-1">Prix</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">€</span>
                        </div>
                        <input type="number" step="0.01" id="prix_categorie_2" name="prix_categorie_2" class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="0.00">
                    </div>
                    @error('prix_categorie_2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <label for="billets_categorie_2" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Nombre de Billets</label>
                    <input type="number" id="billets_categorie_2" name="billets_categorie_2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                    @error('billets_categorie_2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="bg-green-50 p-4 rounded-lg">
                    <h3 class="text-md font-medium text-green-800 mb-2">Catégorie 3 (Économique)</h3>
                    <label for="prix_categorie_3" class="block text-sm font-medium text-gray-700 mb-1">Prix</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">€</span>
                        </div>
                        <input type="number" step="0.01" id="prix_categorie_3" name="prix_categorie_3" class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="0.00">
                    </div>
                    @error('prix_categorie_3')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <label for="billets_categorie_3" class="block text-sm font-medium text-gray-700 mt-4 mb-1">Nombre de Billets</label>
                    <input type="number" id="billets_categorie_3" name="billets_categorie_3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                    @error('billets_categorie_3')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Statut et Description -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-green-700 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Statut et Détails Supplémentaires
            </h2>
            
            <!-- Statut du match -->
            <div class="mb-6">
                <h3 class="text-md font-medium text-green-700 mb-3">Statut du Match</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
                    <div class="flex items-center bg-green-50 p-3 rounded-lg">
                        <input id="statut_programme" name="statut" type="radio" value="programme" checked class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                        <label for="statut_programme" class="ml-2 block text-sm text-gray-700">Programmé</label>
                    </div>
                    <div class="flex items-center bg-green-50 p-3 rounded-lg">
                        <input id="statut_a_venir" name="statut" type="radio" value="a_venir" class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                        <label for="statut_a_venir" class="ml-2 block text-sm text-gray-700">À venir</label>
                    </div>
                    <div class="flex items-center bg-green-50 p-3 rounded-lg">
                        <input id="statut_en_cours" name="statut" type="radio" value="en_cours" class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                        <label for="statut_en_cours" class="ml-2 block text-sm text-gray-700">En cours</label>
                    </div>
                    <div class="flex items-center bg-green-50 p-3 rounded-lg">
                        <input id="statut_termine" name="statut" type="radio" value="termine" class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                        <label for="statut_termine" class="ml-2 block text-sm text-gray-700">Terminé</label>
                    </div>
                    <div class="flex items-center bg-red-50 p-3 rounded-lg">
                        <input id="statut_annule" name="statut" type="radio" value="annule" class="h-4 w-4 text-red-600 border-gray-300 focus:ring-red-500">
                        <label for="statut_annule" class="ml-2 block text-sm text-gray-700">Annulé</label>
                    </div>
                </div>
                @error('statut')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Description supplémentaire -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (facultatif)</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Informations supplémentaires sur le match..."></textarea>
            </div>
        </div>
        
        <div class="flex justify-end space-x-3 mt-8">
            <a href="{{ route('admin.gestion-des-matchs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Annuler
            </a>
            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Créer le Match
            </button>
        </div>
    </form>
</div>

@endsection