@extends('layouts.master')

@section('title','dashboard page ')

@section('content')


  <!-- Sidebar -->
  <div class="flex">
    <!-- Main Content -->
    <div class="ml-64 flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tableau de bord</h2>
        <div class="flex items-center">
          <div class="relative mr-4">
            <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
          </div>
          <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
            <i class="fas fa-plus mr-2"></i>Nouveau ticket
          </button>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500">Tickets totaux</p>
              <h3 class="text-3xl font-bold">245</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
              <i class="fas fa-ticket-alt text-blue-600 text-xl"></i>
            </div>
          </div>
          <p class="text-green-600 flex items-center mt-4">
            <i class="fas fa-arrow-up mr-1"></i>
            <span>12% depuis le mois dernier</span>
          </p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500">En attente</p>
              <h3 class="text-3xl font-bold">42</h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
              <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
          </div>
          <p class="text-yellow-600 flex items-center mt-4">
            <i class="fas fa-minus mr-1"></i>
            <span>Stable depuis le mois dernier</span>
          </p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500">Résolus</p>
              <h3 class="text-3xl font-bold">189</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
              <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
          </div>
          <p class="text-green-600 flex items-center mt-4">
            <i class="fas fa-arrow-up mr-1"></i>
            <span>18% depuis le mois dernier</span>
          </p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500">Temps moyen</p>
              <h3 class="text-3xl font-bold">4.5h</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
              <i class="fas fa-hourglass-half text-purple-600 text-xl"></i>
            </div>
          </div>
          <p class="text-red-600 flex items-center mt-4">
            <i class="fas fa-arrow-up mr-1"></i>
            <span>2% depuis le mois dernier</span>
          </p>
        </div>
      </div>

      <!-- Tickets récents --

      <!-- Graphiques -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow">
          <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Répartition par statut</h3>
          </div>
          <div class="p-6 flex justify-center items-center">
            <!-- Cercle de donut simplifié avec CSS -->
            <div class="relative w-48 h-48">
              <div class="absolute inset-0 rounded-full border-8 border-indigo-500" style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 0 0);"></div>
              <div class="absolute inset-0 rounded-full border-8 border-green-500" style="clip-path: polygon(50% 50%, 100% 50%, 100% 100%, 50% 100%);"></div>
              <div class="absolute inset-0 rounded-full border-8 border-yellow-500" style="clip-path: polygon(50% 50%, 50% 0, 100% 0, 100% 50%);"></div>
              <div class="absolute inset-0 rounded-full border-8 border-red-500" style="clip-path: polygon(50% 50%, 0 0, 50% 0);"></div>
              <div class="absolute inset-0 rounded-full border-8 border-purple-500" style="clip-path: polygon(50% 50%, 0 50%, 0 0);"></div>
              <div class="absolute inset-0 flex items-center justify-center">
                <div class="bg-white rounded-full w-32 h-32 flex items-center justify-center">
                  <p class="text-lg font-bold text-gray-800">Total: 245</p>
                </div>
              </div>
            </div>
          </div>
          <div class="px-6 pb-6 grid grid-cols-2 gap-2">
            <div class="flex items-center">
              <div class="w-4 h-4 bg-green-500 rounded-full mr-2"></div>
              <span class="text-sm">Résolu (77%)</span>
            </div>
            <div class="flex items-center">
              <div class="w-4 h-4 bg-yellow-500 rounded-full mr-2"></div>
              <span class="text-sm">En cours (17%)</span>
            </div>
            <div class="flex items-center">
              <div class="w-4 h-4 bg-red-500 rounded-full mr-2"></div>
              <span class="text-sm">En attente (6%)</span>
            </div>
            <div class="flex items-center">
              <div class="w-4 h-4 bg-indigo-500 rounded-full mr-2"></div>
              <span class="text-sm">Nouveau (10%)</span>
            </div>
            <div class="flex items-center">
              <div class="w-4 h-4 bg-purple-500 rounded-full mr-2"></div>
              <span class="text-sm">Fermé (3%)</span>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow">
          <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Tickets par jour</h3>
          </div>
          <div class="p-6">
            <!-- Graphique à barres simplifié -->
            <div class="flex items-end h-64 space-x-2">
              <div class="flex flex-col items-center justify-end">
                <div class="bg-indigo-500 w-8 h-32 rounded-t"></div>
                <span class="text-xs mt-2">Lun</span>
              </div>
              <div class="flex flex-col items-center justify-end">
                <div class="bg-indigo-500 w-8 h-48 rounded-t"></div>
                <span class="text-xs mt-2">Mar</span>
              </div>
              <div class="flex flex-col items-center justify-end">
                <div class="bg-indigo-500 w-8 h-40 rounded-t"></div>
                <span class="text-xs mt-2">Mer</span>
              </div>
              <div class="flex flex-col items-center justify-end">
                <div class="bg-indigo-500 w-8 h-56 rounded-t"></div>
                <span class="text-xs mt-2">Jeu</span>
              </div>
              <div class="flex flex-col items-center justify-end">
                <div class="bg-indigo-500 w-8 h-48 rounded-t"></div>
                <span class="text-xs mt-2">Ven</span>
              </div>
              <div class="flex flex-col items-center justify-end">
                <div class="bg-indigo-500 w-8 h-24 rounded-t"></div>
                <span class="text-xs mt-2">Sam</span>
              </div>
              <div class="flex flex-col items-center justify-end">
                <div class="bg-indigo-500 w-8 h-16 rounded-t"></div>
                <span class="text-xs mt-2">Dim</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // JavaScript simple pour la démo
    document.addEventListener('DOMContentLoaded', function() {
      console.log('Tableau de bord chargé');
    });
  </script>


    {{-- <script src="../../../../public/assets/js/scrept.js"></script> --}}
@endsection
