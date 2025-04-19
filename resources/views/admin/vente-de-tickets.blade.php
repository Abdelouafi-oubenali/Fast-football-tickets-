@extends('layouts.master')

@section('title','dashbord page ')

@section('content')
  <main class="ml-64 pt-20 p-8">
    <div class="container mx-auto px-4 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl shadow-lg p-6 text-white">
                <h3 class="text-blue-100 font-semibold mb-2">Total des Réservations</h3>
                <p class="text-4xl font-bold">{{$TotalResrvasion}}</p>
            </div>
            <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-xl shadow-lg p-6 text-white">
                <h3 class="text-green-100 font-semibold mb-2">Réservations Payées</h3>
                <p class="text-4xl font-bold">{{$TotalResrvasionPaid}}</p>
            </div>
            <div class="bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-xl shadow-lg p-6 text-white">
                <h3 class="text-yellow-100 font-semibold mb-2">Réservations en Attente</h3>
                <p class="text-4xl font-bold">{{$TotalResrvasionPending}}</p>
            </div>
            <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl shadow-lg p-6 text-white">
                <h3 class="text-purple-100 font-semibold mb-2">Total des Matchs</h3>
                <p class="text-4xl font-bold">{{$TotalTickts}}</p>
                <div class="mt-2 text-purple-100 text-sm">+5% cette semaine</div>
            </div>
        </div>
        
        <!-- Filtres -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <select class="p-2 border rounded-lg">
                    <option>Tous les matchs</option>
                    <option>PSG vs OM</option>
                    <option>Lyon vs Nice</option>
                    <option>Monaco vs Lille</option>
                </select>
                <select class="p-2 border rounded-lg">
                    <option>Toutes catégories</option>
                    <option>VIP</option>
                    <option>Tribune</option>
                    <option>Pelouse</option>
                </select>
                <input type="date" class="p-2 border rounded-lg">
                <input type="date" class="p-2 border rounded-lg">
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Filtrer
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Match</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Places</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forEach($ventes as $teckt)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-medium">{{$teckt->match->homeTeam->name}} vs {{$teckt->match->awayTeam->name}}</div>
                            <div class="text-sm text-gray-500">Parc des Princes</div>
                        </td>
                        <td class="px-6 py-4">
                            <div>{{$teckt->match->date}}</div>
                            <div class="text-sm text-gray-500">{{$teckt->match->time}}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">{{$teckt->category}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div>{{$teckt->user->nom}}</div>
                            <div class="text-sm text-gray-500">{{$teckt->user->email}}</div>
                        </td>
                        <td class="px-6 py-4">{{$teckt->quantity}}</td>
                        <td class="px-6 py-4 font-medium">{{$teckt->totla_price}} DH</td>
                        <td class="px-6 py-4">
                             @php
                                $status = $teckt->status;
                                $bgColor = 'bg-gray-200';
                                $textColor = 'text-gray-800';
                            
                                if ($status === 'paid') {
                                    $bgColor = 'bg-green-100';
                                    $textColor = 'text-green-800';
                                } elseif ($status === 'pending') {
                                    $bgColor = 'bg-yellow-100';
                                    $textColor = 'text-yellow-800';
                                }
                                @endphp
                                
                                <span class="px-3 py-1 {{ $bgColor }} {{ $textColor }} rounded-full text-sm">
                                    {{ $status }}
                                </span>
                            </td>
                    </tr>
                    @endforeach
                    {{-- <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-medium">Lyon vs Nice</div>
                            <div class="text-sm text-gray-500">Groupama Stadium</div>
                        </td>
                        <td class="px-6 py-4">
                            <div>20 Fév 2025</div>
                            <div class="text-sm text-gray-500">19:00</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Tribune</span>
                        </td>
                        <td class="px-6 py-4">
                            <div>Marie Martin</div>
                            <div class="text-sm text-gray-500">marie@email.com</div>
                        </td>
                        <td class="px-6 py-4">4</td>
                        <td class="px-6 py-4 font-medium">320 €</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">En attente</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="bg-indigo-500 text-white px-3 py-1 rounded mr-2 hover:bg-indigo-600 text-sm">
                                Éditer
                            </button>
                            <button class="bg-rose-500 text-white px-3 py-1 rounded hover:bg-rose-600 text-sm">
                                Annuler
                            </button>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
  </main>
  @endsection
