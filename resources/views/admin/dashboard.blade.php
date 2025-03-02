@extends('layouts.master')

@section('title','dashbord page ')

@section('content')
<body class="bg-gray-100">
<!-- header here -->
    <div class="min-h-screen">
        <main class="ml-64 p-8">
            <!-- En-tête -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold">Gestion des Tickets</h1>
                <div>
                    <select id="matchSelect" class="p-2 border rounded-lg">
                        <option value="match1">PSG vs Marseille - 15/02/2025</option>
                        <option value="match2">Lyon vs Lille - 22/02/2025</option>
                        <option value="match3">Monaco vs Lens - 01/03/2025</option>
                    </select>
                </div>
            </div>

            <!-- Statistiques des tickets -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Clients actifs</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">172</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-900">Voir tout</a>
                        </div>
                    </div>
                </div>

                <!-- Projets en cours -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Projets en cours</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">26</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-900">Voir tout</a>
                        </div>
                    </div>
                </div>

                <!-- Revenu mensuel -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Revenu mensuel</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">63 400 €</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-900">Voir le détail</a>
                        </div>
                    </div>
                </div>

                <!-- Tâches à faire -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Tâches à faire</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">12</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-900">Voir tout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan du stade et ventes -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-5 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Évolution du chiffre d'affaires</h3>
                    </div>
                    <div class="p-5">
                        <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-gray-400">Graphique d'évolution du CA</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg">
                    <div class="px-5 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Activités récentes</h3>
                    </div>
                    <div class="p-5">
                        <ul class="divide-y divide-gray-200">
                            <li class="py-3">
                                <div class="flex space-x-3">
                                    <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=144&h=144" alt="">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">Sophie Martin</h3>
                                            <p class="text-sm text-gray-500">Il y a 1h</p>
                                        </div>
                                        <p class="text-sm text-gray-500">A ajouté un nouveau client : Entreprise XYZ</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex space-x-3">
                                    <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">Thomas Durand</h3>
                                            <p class="text-sm text-gray-500">Il y a 3h</p>
                                        </div>
                                        <p class="text-sm text-gray-500">A terminé le projet "Refonte site web" pour le client ABC Corp.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex space-x-3">
                                    <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">Louis Bernard</h3>
                                            <p class="text-sm text-gray-500">Hier</p>
                                        </div>
                                        <p class="text-sm text-gray-500">A créé une nouvelle facture de 12 500 € pour le projet "Application mobile"</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-6">
                            <a href="#" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tableau des catégories de prix -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Catégories de prix</h2>
                <table class="w-full">
                    <thead>
                        <tr class="text-left bg-gray-50">
                            <th class="p-4">Catégorie</th>
                            <th class="p-4">Prix</th>
                            <th class="p-4">Disponibilité</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="priceCategories">
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    {{-- <script src="../../../../public/assets/js/scrept.js"></script> --}}
@endsection
