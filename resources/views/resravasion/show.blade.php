@extends('layouts.main')

@section('title', 'Foot Ticket')

@section('content')

<main class="pt-20 p-8">
    <!-- Récapitulatif des tickets sélectionnés -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Récapitulatif des tickets</h2>
        <div id="ticketSummary" class="space-y-3">
            <p id="emptyTicketMessage" class="text-gray-500 italic">Aucun ticket sélectionné pour le moment.</p>
            <!-- Les tickets sélectionnés seront ajoutés ici dynamiquement -->
        </div>
        
        <div id="totalSummary" class="mt-4 pt-3 border-t border-gray-200 hidden">
            <div class="flex justify-between">
                <p class="font-semibold">Total général:</p>
                <p id="grandTotal" class="font-bold text-blue-600">0€</p>
            </div>
            <button id="checkoutButton" class="mt-3 w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                Procéder au paiement
            </button>
        </div>
    </div>

    <!-- Plan du stade -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Visualisation stade -->
        <div class="md:col-span-2 bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Plan du stade</h2>
            <div class="border-2 border-gray-300 p-4 rounded-lg h-96 relative">

                <div class="absolute top-0 left-1/4 right-1/4 h-16 bg-green-100 border border-green-300 rounded flex items-center justify-center cursor-pointer hover:bg-green-200" onclick="selectTribune('nord')">
                    Tribune Nord
                </div>
                
                <div class="absolute bottom-0 left-1/4 right-1/4 h-16 bg-blue-100 border border-blue-300 rounded flex items-center justify-center cursor-pointer hover:bg-blue-200" onclick="selectTribune('sud')">
                    Tribune Sud
                </div>
                
                <div class="absolute top-1/4 bottom-1/4 right-0 w-16 bg-yellow-100 border border-yellow-300 rounded flex items-center justify-center cursor-pointer hover:bg-yellow-200 writing-mode-vertical" onclick="selectTribune('est')">
                    Tribune Est
                </div>
                
                <div class="absolute top-1/4 bottom-1/4 left-0 w-16 bg-purple-100 border border-purple-300 rounded flex items-center justify-center cursor-pointer hover:bg-purple-200 writing-mode-vertical" onclick="selectTribune('ouest')">
                    Tribune Ouest
                </div>
                
                <div class="absolute top-1/4 left-1/4 right-1/4 bottom-1/4 bg-green-500 rounded-lg flex items-center justify-center text-white">
                    Terrain
                </div>
            </div>
        </div>

        <!-- Informations de billetterie -->
        <div id="ticketInfo" class="bg-white rounded-lg shadow p-6 hidden">
            <h2 class="text-xl font-bold mb-4">Informations billetterie</h2>
            <div id="tribuneTitle" class="text-lg font-semibold mb-3 text-blue-600"></div>
            
            <!-- Catégories de places -->
            <div class="mb-4">
                <label for="categorySelect" class="block text-gray-700 mb-2">Catégorie de place:</label>
                <select id="categorySelect" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Sélectionnez une catégorie</option>
                </select>
            </div>
            
            <!-- Prix unitaire -->
            <div class="mb-4">
                <p class="text-gray-700">Prix unitaire: <span id="unitPrice" class="font-semibold">--</span></p>
            </div>
            
            <!-- Nombre de places avec boutons + et - -->
            <div class="mb-4">
                <label for="quantityInput" class="block text-gray-700 mb-2">Nombre de places:</label>
                <div class="flex items-center">
                    <button type="button" id="decreaseQuantity" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-l">
                        -
                    </button>
                    <input type="number" id="quantityInput" min="1" max="10" value="1" class="w-20 text-center py-2 border-t border-b" readonly>
                    <button type="button" id="increaseQuantity" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-r">
                        +
                    </button>
                </div>
            </div>
            
            <!-- Disponibilité -->
            <div class="mb-4">
                <p class="text-gray-700">Places disponibles: <span id="availability" class="font-semibold text-green-600">--</span></p>
            </div>
            
            <!-- Services supplémentaires -->
            <div class="mb-6">
                <h3 class="font-semibold text-gray-700 mb-2">Services supplémentaires:</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <input type="checkbox" id="drink" class="mr-2 extra-service" data-price="5">
                        <label for="drink">Boisson (+5€)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="snack" class="mr-2 extra-service" data-price="8">
                        <label for="snack">Snack (+8€)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="programme" class="mr-2 extra-service" data-price="3">
                        <label for="programme">Programme du match (+3€)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="scarf" class="mr-2 extra-service" data-price="15">
                        <label for="scarf">Écharpe souvenir (+15€)</label>
                    </div>
                </div>
            </div>
            
            <!-- Total -->
            <div class="mb-6 p-3 bg-gray-100 rounded-lg">
                <p class="text-lg font-bold">Total: <span id="totalPrice" class="text-blue-600">--</span></p>
            </div>
            
            <!-- Bouton de confirmation -->
            <button id="confirmButton" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                Ajouter au panier
            </button>
        </div>
    </div>
</main>

{{-- <script src="{{asset('js/tickets.js')}}"></script> --}}

<script src="{{ asset('js/tickets.js') }}"></script>

@endsection