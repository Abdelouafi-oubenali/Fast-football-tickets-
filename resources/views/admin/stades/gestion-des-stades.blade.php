
@extends('layouts.master')

@section('title','Création de stades')

@section('content')

<nav class="bg-green-800 text-white shadow-lg p-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-futbol text-2xl mr-2"></i>
                    <span class="font-bold text-xl">StadiumPro</span>
                </div>
                <div class="flex items-center">
                    <button class="bg-green-700 hover:bg-green-600 text-white px-4 py-2 rounded-lg mr-2">
                        <i class="fas fa-plus mr-1"></i> Nouveau Stade
                    </button>
                    <div class="relative ml-3">
                        <div>
                            <button class="flex text-sm rounded-full focus:outline-none">
                                <img class="h-8 w-8 rounded-full" src="/api/placeholder/32/32" alt="Avatar">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" style="margin-left: 17rem; margin-top:3rem">
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-800 sm:text-3xl sm:truncate">
                    Gestion des Stades
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <div class="relative">
                    <input type="text" placeholder="Rechercher un stade..." 
                        class="px-4 py-2 border border-gray-300 rounded-lg w-64 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                </div>
                <div class="ml-4">
                    <a href="/stades/create" class="bg-green-700 hover:bg-green-600 text-white px-4 py-2 rounded-lg mr-2" style="background: green">
                        <i class="fas fa-plus mr-1"></i> Nouveau Stade
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden rounded-lg mb-6">
          
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                                    <i class="fas fa-futbol text-green-600 text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Total des stades
                                        </dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">
                                                12
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                                    <i class="fas fa-check-circle text-blue-600 text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Stades disponibles
                                        </dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">
                                                8
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                                    <i class="fas fa-tools text-yellow-600 text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            En maintenance
                                        </dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">
                                                2
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                    <i class="fas fa-calendar-alt text-red-600 text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Réservations actives
                                        </dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">
                                                4
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Stade 1 -->
            <div class="bg-white rounded-lg shadow transition-all duration-200 stadium-card">
                <div class="h-48 w-full bg-gray-200 rounded-t-lg relative overflow-hidden">
                    <img src="/api/placeholder/400/200" alt="Stade Municipal" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs">Disponible</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800">Stade Municipal</h3>
                    <div class="flex items-center text-gray-500 text-sm mt-1">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>15 Rue du Sport, Paris</span>
                    </div>
                    <div class="flex items-center text-gray-500 text-sm mt-1">
                        <i class="fas fa-users mr-1"></i>
                        <span>Capacité: 15,000</span>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex justify-between">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-edit mr-1"></i> Modifier
                            </button>
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-calendar-plus mr-1"></i> Réserver
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-info-circle mr-1"></i> Détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stade 2 -->
            <div class="bg-white rounded-lg shadow transition-all duration-200 stadium-card">
                <div class="h-48 w-full bg-gray-200 rounded-t-lg relative overflow-hidden">
                    <img src="/api/placeholder/400/200" alt="Stade Olympique" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">Maintenance</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800">Stade Olympique</h3>
                    <div class="flex items-center text-gray-500 text-sm mt-1">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>23 Avenue Olympique, Lyon</span>
                    </div>
                    <div class="flex items-center text-gray-500 text-sm mt-1">
                        <i class="fas fa-users mr-1"></i>
                        <span>Capacité: 45,000</span>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex justify-between">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-edit mr-1"></i> Modifier
                            </button>
                            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-tools mr-1"></i> Maintenance
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-info-circle mr-1"></i> Détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stade 3 -->
            <div class="bg-white rounded-lg shadow transition-all duration-200 stadium-card">
                <div class="h-48 w-full bg-gray-200 rounded-t-lg relative overflow-hidden">
                    <img src="/api/placeholder/400/200" alt="Arena Sports" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs">Réservé</div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800">Arena Sports</h3>
                    <div class="flex items-center text-gray-500 text-sm mt-1">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        <span>8 Boulevard Sports, Marseille</span>
                    </div>
                    <div class="flex items-center text-gray-500 text-sm mt-1">
                        <i class="fas fa-users mr-1"></i>
                        <span>Capacité: 25,000</span>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex justify-between">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-edit mr-1"></i> Modifier
                            </button>
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-calendar-times mr-1"></i> Annuler
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-lg text-sm">
                                <i class="fas fa-info-circle mr-1"></i> Détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
    </div>



@endsection