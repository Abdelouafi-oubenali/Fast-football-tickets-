@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
<div class="flex">
    <!-- Main Content -->
    <div class="ml-64 flex-1 p-6 pl-16">
        <div class="flex justify-between items-center mb-6 pl-">
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
                        <h3 class="text-3xl font-bold">{{ $teckts }}</h3>
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
                        <p class="text-gray-500">Match totaux</p>
                        <h3 class="text-3xl font-bold">{{ $matchs }}</h3>
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
                        <p class="text-gray-500">Stades</p>
                        <h3 class="text-3xl font-bold">{{ $Stads }}</h3>
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
                        <p class="text-gray-500">Equipes</p>
                        <h3 class="text-3xl font-bold">{{ $Equipe }}</h3>
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

        <!-- Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Graphique en donut -->
            <div class="bg-white rounded-lg shadow">
              <div class="p-6 border-b border-gray-200">
                  <h3 class="text-lg font-semibold text-gray-800">Répartition des données</h3>
              </div>
              <div class="p-6">
                  <canvas id="donutChart" height="250"></canvas>
              </div>
              <div class="px-6 pb-6 grid grid-cols-2 gap-2">
                  @foreach($chartData['donut']['labels'] as $index => $label)
                      <div class="flex items-center">
                          <div class="w-4 h-4 rounded-full mr-2" style="background-color: {{ $chartData['donut']['colors'][$index] }}"></div>
                          <span class="text-sm">{{ $label }} ({{ $chartData['donut']['data'][$index] }})</span>
                      </div>
                  @endforeach
              </div>
          </div>
            
            <!-- Graphique à barres -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Tickets par jour</h3>
                </div>
                <div class="p-6">
                    <canvas id="barChart" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts pour les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const donutCtx = document.getElementById('donutChart').getContext('2d');
        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: @json($chartData['donut']['labels']),
                datasets: [{
                    data: @json($chartData['donut']['data']),
                    backgroundColor: @json($chartData['donut']['colors']),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '65%'
            }
        });
        // Graphique à barres
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: @json($chartData['bar']['labels']),
                datasets: [{
                    label: 'Nombre de tickets',
                    data: @json($chartData['bar']['data']),
                    backgroundColor: '#6366F1',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        title: {
                            display: true,
                            text: 'Nombre de tickets'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Jours de la semaine'
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.parsed.y} tickets`;
                            }
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
@endsection