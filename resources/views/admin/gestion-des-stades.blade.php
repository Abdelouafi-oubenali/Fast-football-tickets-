

@extends('layouts.master')

@section('title','dashbord page ')

@section('content')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Gestion des Stades de Football</h1>

        <div class="bg-white shadow-md rounded p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Ajouter un stade</h2>
            <form id="stadiumForm" class="space-y-4">
                <div class="flex items-center space-x-4">
                    <label for="stadiumName" class="w-1/4 text-gray-700 font-medium">Nom du stade:</label>
                    <input type="text" id="stadiumName" placeholder="Nom du stade" class="border p-2 rounded w-3/4 focus:ring focus:ring-blue-200 focus:border-blue-300" required>
                </div>
                 <div class="flex items-center space-x-4">
                    <label for="stadiumCapacity" class="w-1/4 text-gray-700 font-medium">Capacité:</label>
                    <input type="number" id="stadiumCapacity" placeholder="Capacité du stade" class="border p-2 rounded w-3/4 focus:ring focus:ring-blue-200 focus:border-blue-300" required>
                </div>
                <div class="flex items-center space-x-4">
                    <label for="stadiumCity" class="w-1/4 text-gray-700 font-medium">Ville:</label>
                    <input type="text" id="stadiumCity" placeholder="Ville" class="border p-2 rounded w-3/4 focus:ring focus:ring-blue-200 focus:border-blue-300" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Ajouter</span>
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white shadow-md rounded p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Liste des stades</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border-b p-3 text-left font-semibold text-gray-700">Nom du stade</th>
                            <th class="border-b p-3 text-left font-semibold text-gray-700">Capacité</th>
                            <th class="border-b p-3 text-left font-semibold text-gray-700">Ville</th>
                            <th class="border-b p-3 text-left font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="stadiumList">
                        <!-- Les stades seront ajoutés ici dynamiquement -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
