@extends('layouts.master')

@section('title','Modification de tickets')

@section('content')

<!-- Contenu principal -->
<main class="flex-grow w-[75rem] ml-[18rem]">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Oups ! Il y a des erreurs :</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Modification de Tickets</h2>
                <div class="flex space-x-2">
                    <a href="{{ route('tickets.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md">Annuler</a>
                    <button type="submit" form="updateForm" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Mettre à jour</button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <!-- Formulaire pour mettre à jour un ticket -->
                <form method="POST" action="{{ route('tickets.update', $ticket->id) }}" id="updateForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Informations du Match</h3>
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <div>
                                <label for="equipe_domicile" class="block text-gray-700 mb-1">Équipe Domicile</label>
                                <select id="equipe_domicile" name="home_team_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @foreach($equipes as $equipe)
                                        <option value="{{ $equipe->id }}" {{ $ticket->home_team_id == $equipe->id ? 'selected' : '' }}>{{ $equipe->name }}</option>
                                    @endforeach
                                </select>
                                @error('home_team_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="equipe_exterieur" class="block text-gray-700 mb-1">Équipe Extérieur</label>
                                <select id="equipe_exterieur" name="away_team_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @foreach($equipes as $equipe)
                                    <option value="{{ $equipe->id }}" {{ $ticket->away_team_id == $equipe->id ? 'selected' : '' }}>{{ $equipe->name }}</option>
                                @endforeach
                                </select>
                                @error('away_team_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="competition" class="block text-gray-700 mb-1">Compétition</label>
                                <select id="competition" name="competition" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">-- Sélectionner une compétition --</option>
                                    <option value="l1" {{ $ticket->competition == 'l1' ? 'selected' : '' }}>Ligue 1</option>
                                    <option value="cdf" {{ $ticket->competition == 'cdf' ? 'selected' : '' }}>Coupe de France</option>
                                    <option value="cdl" {{ $ticket->competition == 'cdl' ? 'selected' : '' }}>Coupe de la Ligue</option>
                                    <option value="ucl" {{ $ticket->competition == 'ucl' ? 'selected' : '' }}>Ligue des Champions</option>
                                    <option value="uel" {{ $ticket->competition == 'uel' ? 'selected' : '' }}>Ligue Europa</option>
                                </select>
                            </div>
                            <div>
                                <label for="stade" class="block text-gray-700 mb-1">Stade</label>
                                <select id="stade" name="Stadium" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">-- Sélectionner un stade --</option>
                                    @foreach($stades as $stad)
                                    <option value="{{$stad->name}}" {{ $ticket->Stadium == $stad->name ? 'selected' : '' }}>{{$stad->name}}</option>
                                @endforeach
                                </select>
                                @error('Stadium')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                @php
                                $tomorrow = \Carbon\Carbon::tomorrow()->toDateString();
                            @endphp

                                <label for="date_match" class="block text-gray-700 mb-1">Date du Match</label>
                                <input type="date" id="date_match" name="date" value="{{ old('date', $tomorrow) }}" min="{{ $tomorrow }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                                @error('date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="heure_match" class="block text-gray-700 mb-1">Heure du Match</label>
                                <input type="time" id="heure_match" name="time" value="{{ $ticket->time }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @error('time')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tarifs par catégorie -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Tarifs par Catégorie</h3>
                
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border px-4 py-2 text-left">Catégorie</th>
                                        <th class="border px-4 py-2 text-left">Prix Standard Dh</th>
                                        <th class="border px-4 py-2 text-left">Places Disponibles</th>
                                        <th class="border px-4 py-2 text-left">Actif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ticket->categories as $index => $category)
                                    <tr>
                                        <td class="border px-4 py-2">
                                            {{ $category->nom }}
                                            <input type="hidden" name="categories[{{ $index }}][id]" value="{{ $category->id }}">
                                            <input type="hidden" name="categories[{{ $index }}][nom]" value="{{ $category->nom }}">
                                        </td>
                                
                                        <td class="border px-4 py-2">
                                            <input type="number" name="categories[{{ $index }}][prix]" value="{{ old("categories.$index.prix", $category->prix) }}" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            @error("categories.$index.prix")
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </td>
                                
                                        <td class="border px-4 py-2">
                                            <input type="number" name="categories[{{ $index }}][places]" value="{{ old("categories.$index.places", $category->nombre_place) }}" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            @error("categories.$index.places")
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </td>
                                
                                        <td class="border px-4 py-2 text-center">
                                            <input type="hidden" name="categories[{{ $index }}][actif]" value="0">
                                            <input type="checkbox" name="categories[{{ $index }}][actif]" value="1" {{ old("categories.$index.actif", $category->actif) ? 'checked' : '' }} class="h-4 w-4 text-blue-600">
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Paramètres supplémentaires -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Paramètres Supplémentaires</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <input type="checkbox" id="limit_tickets" name="limit_tickets" {{ $ticket->limit_tickets ? 'checked' : '' }} class="mt-1 h-4 w-4 text-blue-600">
                                <label for="limit_tickets" class="ml-2 block text-gray-700">Limiter le nombre de billets par transaction</label>
                            </div>
                            <div class="ml-6">
                                <label class="block text-sm text-gray-700 mb-1">Nombre maximum de billets par transaction</label>
                                <input type="number" name="max_tickets" value="{{ $ticket->max_tickets }}" min="1" class="w-40 px-2 py-1 border border-gray-300 rounded-md">
                            </div>
                            
                            <div class="flex items-start">
                                <input type="checkbox" id="display_map" name="display_map" {{ $ticket->display_map ? 'checked' : '' }} class="mt-1 h-4 w-4 text-blue-600">
                                <label for="display_map" class="ml-2 block text-gray-700">Afficher le plan du stade lors de la sélection des places</label>
                            </div>
                            
                            <div class="flex items-start">
                                <input type="checkbox" id="allow_resale" name="allow_resale" {{ $ticket->allow_resale ? 'checked' : '' }} class="mt-1 h-4 w-4 text-blue-600">
                                <label for="allow_resale" class="ml-2 block text-gray-700">Autoriser la revente des billets sur la plateforme officielle</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notes internes -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Notes Internes</h3>
                        <textarea name="notes_internes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Notes visibles uniquement par l'équipe administrative...">{{ $ticket->notes_internes }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('tickets.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md">Annuler</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Mettre à jour les tickets</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-4">
        <div class="container mx-auto px-4 text-sm">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>&copy; 2025 FootTicket Admin. Tous droits réservés.</div>
                <div class="mt-2 md:mt-0">
                    <a href="#" class="text-gray-300 hover:text-white mx-2">Aide</a>
                    <a href="#" class="text-gray-300 hover:text-white mx-2">Support</a>
                    <a href="#" class="text-gray-300 hover:text-white mx-2">Documentation</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<style>
    .toggle-checkbox:checked {
        right: 0;
        border-color: #79f63b;
    }
    .toggle-checkbox:checked + .toggle-label {
        background-color: #3B82F6;
    }
</style>
@endsection