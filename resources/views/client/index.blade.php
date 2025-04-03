<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootTickets - Réservation de billets</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .stadium-seat {
            transition: all 0.2s ease-in-out;
        }
        .stadium-seat:hover:not(.seat-taken) {
            transform: scale(1.1);
        }
        .slide-enter {
            animation: slide-in 0.3s ease-out forwards;
        }
        @keyframes slide-in {
            0% { transform: translateX(100%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        .fade-in {
            animation: fade-in 0.5s ease-out forwards;
        }
        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div x-data="ticketApp()" class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-800 text-white shadow-lg">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-futbol text-2xl"></i>
                    <span class="text-xl font-bold">FootTickets</span>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="hover:text-blue-200 transition">
                        <i class="fas fa-user mr-1"></i> Mon compte
                    </button>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center hover:text-blue-200 transition">
                            <span x-text="cartCount + ' article(s)'"></span>
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="container mx-auto px-4 py-8 flex-grow">
            <!-- Breadcrumbs -->
            <div class="text-sm text-gray-600 mb-6 fade-in">
                <span x-text="steps[currentStep].label"></span>
            </div>

            <!-- Step 1: Match selection -->
            <div x-show="currentStep === 0" class="fade-in">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Prochains matchs disponibles</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="match in matches" :key="match.id">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                            <div class="h-40 bg-cover bg-center" :style="`background-image: url(${match.image})`">
                                <div class="w-full h-full bg-black bg-opacity-40 flex items-center justify-center">
                                    <div class="text-white text-center p-4">
                                        <div class="text-xl font-bold" x-text="match.teams"></div>
                                        <div class="text-sm mt-1" x-text="match.date"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600" x-text="match.stadium"></span>
                                    <span class="font-bold text-blue-800" x-text="'À partir de ' + match.minPrice + '€'"></span>
                                </div>
                                <button 
                                    @click="selectMatch(match)" 
                                    class="w-full mt-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition">
                                    Réserver
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Step 2: Seat selection -->
            <div x-show="currentStep === 1" class="fade-in">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Sélection des places</h1>
                    <button @click="currentStep = 0" class="text-blue-600 hover:text-blue-800 transition flex items-center">
                        <i class="fas fa-arrow-left mr-1"></i> Retour
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800" x-text="selectedMatch.teams"></h2>
                            <p class="text-gray-600 mt-1" x-text="selectedMatch.date + ' - ' + selectedMatch.stadium"></p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <span class="text-sm text-gray-600">Prix par place:</span>
                            <div class="flex space-x-4 mt-1">
                                <div>
                                    <span class="inline-block w-4 h-4 bg-green-500 rounded-full mr-1"></span>
                                    <span>30€</span>
                                </div>
                                <div>
                                    <span class="inline-block w-4 h-4 bg-blue-500 rounded-full mr-1"></span>
                                    <span>50€</span>
                                </div>
                                <div>
                                    <span class="inline-block w-4 h-4 bg-purple-500 rounded-full mr-1"></span>
                                    <span>80€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stadium visualization -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="text-center mb-8">
                        <div class="w-full h-16 bg-gray-300 rounded-t-lg flex items-center justify-center text-gray-700 font-bold">
                            TERRAIN
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap justify-center gap-1 mb-8">
                        <template x-for="seat in seats" :key="seat.id">
                            <div 
                                @click="!seat.taken && toggleSeat(seat)"
                                :class="`stadium-seat w-8 h-8 rounded-md flex items-center justify-center cursor-pointer text-xs font-bold ${
                                    seat.taken ? 'bg-gray-400 text-white cursor-not-allowed seat-taken' : 
                                    seat.selected ? 'bg-yellow-500 text-white' : 
                                    seat.price === 30 ? 'bg-green-500 text-white' :
                                    seat.price === 50 ? 'bg-blue-500 text-white' : 'bg-purple-500 text-white'
                                }`"
                                :title="`Place ${seat.id} - ${seat.price}€`"
                            >
                                <span x-text="seat.id"></span>
                            </div>
                        </template>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-600">
                            <span x-text="selectedSeats.length"></span> place(s) sélectionnée(s)
                        </div>
                        <div class="text-xl font-bold text-blue-800">
                            Total: <span x-text="totalPrice + '€'"></span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button 
                        @click="currentStep = 2" 
                        :disabled="selectedSeats.length === 0"
                        :class="`px-6 py-3 rounded-md text-white transition ${
                            selectedSeats.length === 0 ? 'bg-gray-400 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700'
                        }`">
                        Continuer
                    </button>
                </div>
            </div>

            <!-- Step 3: Checkout -->
            <div x-show="currentStep === 2" class="fade-in">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Finaliser votre commande</h1>
                    <button @click="currentStep = 1" class="text-blue-600 hover:text-blue-800 transition flex items-center">
                        <i class="fas fa-arrow-left mr-1"></i> Retour
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Order summary -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                            <h2 class="text-lg font-bold text-gray-800 mb-4">Récapitulatif de la commande</h2>
                            
                            <div class="border-b pb-4 mb-4">
                                <div class="flex justify-between mb-2">
                                    <span class="font-bold" x-text="selectedMatch.teams"></span>
                                    <span x-text="selectedMatch.date"></span>
                                </div>
                                <div class="text-sm text-gray-600" x-text="selectedMatch.stadium"></div>
                            </div>

                            <div class="space-y-2 mb-4">
                                <template x-for="(seat, index) in selectedSeats" :key="index">
                                    <div class="flex justify-between items-center">
                                        <span>Place <span x-text="seat.id"></span></span>
                                        <span class="font-bold" x-text="seat.price + '€'"></span>
                                    </div>
                                </template>
                            </div>

                            <div class="border-t pt-4">
                                <div class="flex justify-between items-center text-lg font-bold">
                                    <span>Total</span>
                                    <span class="text-blue-800" x-text="totalPrice + '€'"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment form -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-lg font-bold text-gray-800 mb-4">Informations de paiement</h2>
                            
                            <form @submit.prevent="submitOrder">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="card-name">
                                        Nom sur la carte
                                    </label>
                                    <input 
                                        id="card-name" 
                                        type="text" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="John Doe"
                                        required
                                    >
                                </div>
                                
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="card-number">
                                        Numéro de carte
                                    </label>
                                    <input 
                                        id="card-number" 
                                        type="text" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="1234 5678 9012 3456"
                                        required
                                    >
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="expiry">
                                            Date d'expiration
                                        </label>
                                        <input 
                                            id="expiry" 
                                            type="text" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="MM/AA"
                                            required
                                        >
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cvv">
                                            CVV
                                        </label>
                                        <input 
                                            id="cvv" 
                                            type="text" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="123"
                                            required
                                        >
                                    </div>
                                </div>
                                
                                <button 
                                    type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-md font-bold transition">
                                    Payer <span x-text="totalPrice + '€'"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4: Confirmation -->
            <div x-show="currentStep === 3" class="fade-in">
                <div class="text-center py-12 max-w-lg mx-auto">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-check text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">Réservation confirmée !</h1>
                    <p class="text-gray-600 mb-8">
                        Votre réservation pour <span class="font-bold" x-text="selectedMatch.teams"></span> 
                        le <span x-text="selectedMatch.date"></span> a été confirmée. 
                        Un email de confirmation a été envoyé à votre adresse.
                    </p>
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-600">Numéro de réservation:</span>
                            <span class="font-bold">FT-2025-<span x-text="Math.floor(Math.random() * 100000)"></span></span>
                        </div>
                        <div class="border-t pt-4">
                            <div class="text-center">
                                <img src="/api/placeholder/200/200" alt="QR Code" class="mx-auto mb-2">
                                <div class="text-sm text-gray-600">Présentez ce code au stade</div>
                            </div>
                        </div>
                    </div>
                    <button 
                        @click="resetApp()" 
                        class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-8 rounded-md transition">
                        Retour à l'accueil
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-bold mb-4">FootTickets</h3>
                        <p class="text-gray-400">La référence pour la réservation de billets de football en ligne.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Liens utiles</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition">À propos</a></li>
                            <li><a href="#" class="hover:text-white transition">Conditions générales</a></li>
                            <li><a href="#" class="hover:text-white transition">Politique de confidentialité</a></li>
                            <li><a href="#" class="hover:text-white transition">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Nous suivre</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-500">
                    <p>&copy; 2025 FootTickets. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function ticketApp() {
            return {
                currentStep: 0,
                steps: [
                    { id: 0, label: 'Sélection du match' },
                    { id: 1, label: 'Sélection des places' },
                    { id: 2, label: 'Paiement' },
                    { id: 3, label: 'Confirmation' }
                ],
                matches: [
                    { 
                        id: 1, 
                        teams: 'PSG vs Marseille', 
                        date: '15 Avril 2025, 20:45', 
                        stadium: 'Parc des Princes, Paris',
                        minPrice: 30,
                        image: '/api/placeholder/400/320'
                    },
                    { 
                        id: 2, 
                        teams: 'Lyon vs Monaco', 
                        date: '18 Avril 2025, 21:00', 
                        stadium: 'Groupama Stadium, Lyon',
                        minPrice: 25,
                        image: '/api/placeholder/400/320'
                    },
                    { 
                        id: 3, 
                        teams: 'Lille vs Rennes', 
                        date: '19 Avril 2025, 17:00', 
                        stadium: 'Stade Pierre-Mauroy, Lille',
                        minPrice: 20,
                        image: '/api/placeholder/400/320'
                    },
                    { 
                        id: 4, 
                        teams: 'Lens vs Nice', 
                        date: '20 Avril 2025, 15:00', 
                        stadium: 'Stade Bollaert-Delelis, Lens',
                        minPrice: 18,
                        image: '/api/placeholder/400/320'
                    },
                    { 
                        id: 5, 
                        teams: 'Strasbourg vs Nantes', 
                        date: '21 Avril 2025, 19:00', 
                        stadium: 'Stade de la Meinau, Strasbourg',
                        minPrice: 15,
                        image: '/api/placeholder/400/320'
                    },
                    { 
                        id: 6, 
                        teams: 'Bordeaux vs Saint-Étienne', 
                        date: '22 Avril 2025, 20:00', 
                        stadium: 'Matmut Atlantique, Bordeaux',
                        minPrice: 20,
                        image: '/api/placeholder/400/320'
                    }
                ],
                seats: [],
                selectedMatch: null,
                selectedSeats: [],
                cartCount: 0,
                
                initSeats() {
                    this.seats = [];
                    // Generate seats with different price categories
                    for (let i = 1; i <= 100; i++) {
                        let price = 30; // Default price
                        
                        // Premium seats
                        if (i >= 25 && i <= 40) {
                            price = 80;
                        } 
                        // Mid-range seats
                        else if ((i >= 15 && i <= 24) || (i >= 41 && i <= 50)) {
                            price = 50;
                        }
                        
                        // Some seats are already taken
                        const taken = [7, 13, 22, 28, 33, 45, 56, 67, 74, 88, 95].includes(i);
                        
                        this.seats.push({
                            id: i,
                            price: price,
                            taken: taken,
                            selected: false
                        });
                    }
                },
                
                get totalPrice() {
                    return this.selectedSeats.reduce((total, seat) => total + seat.price, 0);
                },
                
                selectMatch(match) {
                    this.selectedMatch = match;
                    this.initSeats();
                    this.selectedSeats = [];
                    this.currentStep = 1;
                },
                
                toggleSeat(seat) {
                    if (seat.taken) return;
                    
                    const index = this.seats.findIndex(s => s.id === seat.id);
                    this.seats[index].selected = !this.seats[index].selected;
                    
                    if (this.seats[index].selected) {
                        this.selectedSeats.push(seat);
                    } else {
                        this.selectedSeats = this.selectedSeats.filter(s => s.id !== seat.id);
                    }
                },
                
                submitOrder() {
                    // Simulate order processing with a brief delay
                    setTimeout(() => {
                        this.cartCount += this.selectedSeats.length;
                        this.currentStep = 3;
                    }, 1000);
                },
                
                resetApp() {
                    this.currentStep = 0;
                    this.selectedMatch = null;
                    this.selectedSeats = [];
                    this.initSeats();
                }
            }
        }
    </script>
</body>
</html>