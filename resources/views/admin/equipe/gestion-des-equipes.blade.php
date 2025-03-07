@extends('layouts.master')

@section('title', 'Gestion des Équipes')

@section('content')
<div class="container mx-auto px-4 py-8 ml-[16rem] mt-[2rem] w-[79rem]">

    <div class="grid md:grid-cols-1 gap-6">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-blue-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Liste des Équipes
                </h2>
                <div class="flex items-center">
                    <input type="text" placeholder="Rechercher une équipe" class="px-3 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button class="bg-green-500 text-white px-4 py-2 rounded-r-lg hover:bg-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <a href="../equipe/create" class="flex items-center bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300 ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Créer une Équipe
                    </a>
                </div>
            </div>
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">
                            <input type="checkbox" class="form-checkbox">
                        </th>
                        <th class="p-3 text-left">Nom de l'Équipe</th>
                        <th class="p-3 text-left">Ville</th>
                        <th class="p-3 text-center">Joueurs</th>
                        <th class="p-3 text-left">Création</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 5; $i++)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">
                            <input type="checkbox" class="form-checkbox">
                        </td>
                        <td class="p-3 flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full mr-3 flex items-center justify-center">
                                <span class="text-blue-600 font-bold">{{ substr("Équipe $i", 0, 1) }}</span>
                            </div>
                            Équipe {{ $i }}
                        </td>
                        <td class="p-3">Ville {{ $i }}</td>
                        <td class="p-3 text-center">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                {{ rand(5, 15) }}
                            </span>
                        </td>
                        <td class="p-3">{{ \Carbon\Carbon::now()->subDays($i)->format('d/m/Y') }}</td>
                        <td class="p-3 text-center space-x-2">
                            <button class="text-blue-500 hover:text-blue-700" title="Détails">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="text-yellow-500 hover:text-yellow-700" title="Éditer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                            <button class="text-red-500 hover:text-red-700" title="Supprimer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>

            
        </div>
    </div>


</div>

@endsection

@section('scripts')
<script>

</script>
@endsection