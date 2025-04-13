@extends('layouts.main')

@section('title', 'Foot Ticket')

@section('content')

<main class="pt-20 p-8">
    <form action="{{route('reservation.store')}}" method="POST">
        @csrf

        <input name="match_id" type="hidden" value="{{$id}}">
    <!-- Récapitulatif des tickets sélectionnés -->

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4">Récapitulatif des tickets</h2>
        <div id="ticketSummary" class="space-y-3">
            <p id="emptyTicketMessage" class="text-gray-500 italic">Aucun ticket sélectionné pour le moment.</p>
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

    <div id="tran-info" class="grid grid-cols-1 md:grid-cols-3 gap-6" >
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
                    <div class="absolute inset-x-1/4 inset-y-1/4 bg-gold border-2 border-yellow-600 rounded-lg flex items-center justify-center text-black font-bold cursor-pointer hover:bg-yellow-400 transition-colors" style="background-color: #FFD700;" onclick="selectTribune('vip')">
                        Zone VIP
                    </div>
                </div>
            </div>
        </div>

        <div id="ticketInfo" class="bg-white rounded-lg shadow p-6 hidden">
            <h2 class="text-xl font-bold mb-4">Informations billetterie</h2>
            <div id="tribuneTitle" class="text-lg font-semibold mb-3 text-blue-600"></div>
            
            <div class="mb-4">
                <label for="categorySelect" class="block text-gray-700 mb-2">Catégorie de place:</label>
                <select id="categorySelect" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Sélectionnez une catégorie</option>
                </select>
            </div>
            
            <div class="mb-4">
                <p class="text-gray-700">Prix unitaire: <span id="unitPrice" class="font-semibold">--</span></p>
            </div>
            
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
            
            <div class="mb-4">
                <p class="text-gray-700">Places disponibles: <span id="availability" class="font-semibold text-green-600">--</span></p>
            </div>
            
            <div class="mb-6 p-3 bg-gray-100 rounded-lg">
                <p class="text-lg font-bold">Total: <span id="totalPrice" class="text-blue-600">--</span></p>
            </div>
            
            <button type="submit" id="confirmButton" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                Ajouter au panier
            </button>

        </form>
        </div>
    </div>

    <!-- Popup d'information sur les tribunes -->
    <div id="infoPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 ">
        <div class="bg-white rounded-lg p-6 max-w-md w-full max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Informations sur les tribunes</h3>
                <button id="closePopup" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="space-y-4">
                @foreach($tribunes as $code => $tribune)
                <div class="border-b pb-4">
                    <h4 class="font-semibold text-blue-600">{{ $tribune['name'] }}</h4>
                    <ul class="mt-2 space-y-1 text-sm">
                        @foreach($tribune['categories'] as $category)
                        <li>- {{ $category['name'] }}: {{ $category['price'] }}€</li>
                        @endforeach
                        <li>- Capacité: {{ number_format($tribune['capacity'], 0, ',', ' ') }} places</li>
                        @if(!empty($tribune['advantages']))
                            @foreach($tribune['advantages'] as $advantage)
                            <li>- {{ $advantage }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                @endforeach
            </div>
            
            <button id="closePopupBtn" class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                Fermer
            </button>
        </div>
    </div>

    <!-- Bouton pour ouvrir la popup -->
    <div class="fixed bottom-4 right-4">
        <button id="openPopup" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-full shadow-lg transition duration-200 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
            </svg>
            Infos Tribunes
        </button>
    </div>
</main>

<style>
    .writing-mode-vertical {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        transform: rotate(180deg);
    }

    .max-h-80vh {
        max-height: 80vh;
    }
</style>

<script>
    window.tribuneData = @json($tribunes);
</script>

<script src="{{ asset('js/tickets.js') }}"></script>

@endsection












