
@extends('layouts.master')

@section('title','dashbord page ')

@section('content')

    <!-- Contenu principal -->
    <main class="ml-64 pt-20 p-8">
        <!-- En-tête avec actions -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-4">
                <input 
                    type="search" 
                    placeholder="Rechercher un match..." 
                    class="px-4 py-2 border rounded-lg w-64"
                >
                <select class="px-4 py-2 border rounded-lg">
                    <option>Tous les statuts</option>
                    <option>À venir</option>
                    <option>En cours</option>
                    <option>Terminé</option>
                </select>
            </div>
            <button 
                onclick="openAddMatchModal()"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700"
            >
                + Ajouter un match
            </button>
        </div>

        <!-- Tableau des matchs -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Équipes
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Stade
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Places disponibles
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Statut
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="matchesTable">
                    <!-- Le contenu sera généré en JavaScript -->
                    <tbody id="matchesTable" class="bg-white divide-y divide-gray-200">
                   </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">2025-02-22 21:00</td>
                        <td class="px-6 py-4 whitespace-nowrap">Lyon vs Lille</td>
                        <td class="px-6 py-4 whitespace-nowrap">Groupama Stadium</td>
                        <td class="px-6 py-4 whitespace-nowrap">12000</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                À venir
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button onclick="editMatch(2)" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button onclick="deleteMatch(2)" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal Ajouter/Modifier un match -->
    <div id="matchModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4" id="modalTitle">
                    Ajouter un match
                </h3>
                <form id="matchForm" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Équipe domicile</label>
                        <input type="text" name="homeTeam" class="mt-1 block w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Équipe extérieure</label>
                        <input type="text" name="awayTeam" class="mt-1 block w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date et heure</label>
                        <input type="datetime-local" name="datetime" class="mt-1 block w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Stade</label>
                        <input type="text" name="stadium" class="mt-1 block w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Capacité</label>
                        <input type="number" name="capacity" class="mt-1 block w-full border rounded-md p-2">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded-md">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                            Sauvegarder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../../../../public/assets/js/scrept.js">

    </script>
  @endsection
    