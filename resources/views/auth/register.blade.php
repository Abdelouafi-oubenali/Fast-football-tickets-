<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootTicket  - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
        }
        
        .ticket-stripe {
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255,255,255,0.05) 10px,
                rgba(255,255,255,0.05) 20px
            );
        }
        
        .stadium-bg {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTAgMTAwSDEwMFYyMDBIMFYxMDBaTTEwMCAwSDIwMFYxMDBIMTAwVjBaIiBmaWxsPSJyZ2JhKDM0LDE5Nyw4OSwwLjAzKSIvPjwvc3ZnPg==');
            background-size: 20px 20px;
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        @keyframes pulse-glow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-950 to-gray-900 relative overflow-x-hidden">
    <!-- Stadium Background Elements -->
    <div class="absolute inset-0 stadium-bg"></div>
    
    <!-- Stadium Lights -->
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-green-400 to-transparent opacity-30"></div>
    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-green-400 to-transparent opacity-30"></div>
    
    <!-- Animated Elements -->
    <div class="absolute top-10 left-5 w-4 h-4 bg-green-500 rounded-full pulse-glow"></div>
    <div class="absolute top-1/4 right-10 w-6 h-6 bg-white rounded-full pulse-glow" style="animation-delay: 0.5s;"></div>
    <div class="absolute bottom-1/3 left-1/4 w-3 h-3 bg-green-400 rounded-full pulse-glow" style="animation-delay: 1s;"></div>
    <div class="absolute top-3/4 right-1/4 w-5 h-5 bg-white rounded-full pulse-glow" style="animation-delay: 1.5s;"></div>

    <!-- Main Content -->
    <div class="relative min-h-screen flex items-center justify-center p-4 py-12">
        <div class="w-full max-w-6xl">
            <!-- Header -->
            <div class="text-center mb-10 float-animation">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full shadow-2xl shadow-green-900/50 mb-6 border-4 border-white/10">
                    <i class="fas fa-ticket-alt text-4xl text-white"></i>
                </div>
                <h1 class="text-5xl font-black text-white mb-3 tracking-tight">
                    FOOT<span class="text-green-400">TICKET</span>
                </h1>
                <p class="text-gray-300 text-lg font-medium">Votre billet pour les plus grands matchs de football</p>
                <div class="inline-flex items-center mt-4 px-4 py-2 bg-green-900/40 rounded-full border border-green-700/50">
                    <i class="fas fa-star text-yellow-400 mr-2 text-sm"></i>
                    <span class="text-green-300 text-sm font-medium">Réservation 100% sécurisée</span>
                </div>
            </div>

            <!-- Main Card -->
            <div class="bg-gray-900/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-800 overflow-hidden">
                <div class="grid lg:grid-cols-5 gap-0">
                    <!-- Left Side - Info Panel -->
                    <div class="lg:col-span-2 bg-gradient-to-br from-gray-900 to-gray-950 p-8 lg:p-12 text-white relative overflow-hidden border-r border-gray-800">
                        <!-- Ticket Stripe Effect -->
                        <div class="absolute top-0 right-0 w-32 h-full ticket-stripe"></div>
                        
                        <div class="relative z-10">
                            <h2 class="text-3xl font-bold mb-8">Réservez vos <span class="text-green-400">places</span> dès maintenant ⚽</h2>
                            
                            <div class="space-y-7 mb-10">
                                <div class="flex items-start space-x-4 p-4 bg-gray-800/50 rounded-xl hover:bg-gray-800/70 transition-colors">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <i class="fas fa-stadium text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1">Accès aux plus grands stades</h3>
                                        <p class="text-gray-300 text-sm">Camp Nou, Old Trafford, Parc des Princes, et plus</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4 p-4 bg-gray-800/50 rounded-xl hover:bg-gray-800/70 transition-colors">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <i class="fas fa-bolt text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1">Réservation instantanée</h3>
                                        <p class="text-gray-300 text-sm">Confirmation immédiate de vos billets</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4 p-4 bg-gray-800/50 rounded-xl hover:bg-gray-800/70 transition-colors">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <i class="fas fa-shield-alt text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-1">Paiement sécurisé</h3>
                                        <p class="text-gray-300 text-sm">Transactions cryptées et garanties</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-5 bg-gradient-to-r from-green-900/40 to-green-950/40 rounded-xl border border-green-800/50">
                                <div class="flex items-center">
                                    <div class="mr-4 text-3xl text-green-400">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-200 italic">"J'ai réservé mes places pour le Classico en 2 minutes chrono ! Expérience incroyable."</p>
                                        <p class="text-green-300 text-sm font-semibold mt-2">— Pierre M., Fan du PSG</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-12 pt-8 border-t border-gray-700">
                                <p class="text-gray-300">Vous avez déjà un compte ?</p>
                                <a href="login" class="inline-flex items-center justify-center mt-3 px-6 py-3 bg-gray-800 text-white rounded-xl font-bold hover:bg-gray-700 transition-all duration-300 transform hover:scale-105 border border-gray-700 w-full">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Se connecter
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Form -->
                    <div class="lg:col-span-3 p-8 lg:p-12">
                        <div class="max-w-xl mx-auto">
                            <div class="mb-8">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-3xl font-bold text-white">Inscription</h2>
                                    <div class="px-4 py-2 bg-green-900/30 rounded-full border border-green-700/50">
                                        <span class="text-green-300 text-sm font-bold">RAPIDE & SÉCURISÉ</span>
                                    </div>
                                </div>
                                <p class="text-gray-400">Créez votre compte pour réserver vos tickets en quelques clics</p>
                            </div>

                            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                                @csrf

                                <!-- Prénom & Nom -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div class="group">
                                        <label class="block text-sm font-bold text-gray-300 mb-2" for="prenom">
                                            Prénom
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <i class="fas fa-user text-green-500"></i>
                                            </div>
                                            <input 
                                                class="w-full bg-gray-800/70 border-2 border-gray-700 rounded-xl py-3.5 pl-12 pr-4 text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-500/30 transition-all duration-300" 
                                                id="prenom" 
                                                type="text" 
                                                name="prenom" 
                                                placeholder="Ex: Mohamed"
                                                value="{{ old('prenom') }}"
                                                required
                                            >
                                        </div>
                                        @error('prenom')
                                            <p class="text-red-400 text-xs mt-2 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-bold text-gray-300 mb-2" for="nom">
                                            Nom
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <i class="fas fa-user text-green-500"></i>
                                            </div>
                                            <input 
                                                class="w-full bg-gray-800/70 border-2 border-gray-700 rounded-xl py-3.5 pl-12 pr-4 text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-500/30 transition-all duration-300" 
                                                id="nom" 
                                                type="text" 
                                                name="nom" 
                                                placeholder="Ex: Salah"
                                                value="{{ old('nom') }}"
                                                required
                                            >
                                        </div>
                                        @error('nom')
                                            <p class="text-red-400 text-xs mt-2 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="group">
                                    <label class="block text-sm font-bold text-gray-300 mb-2" for="email">
                                        Adresse Email
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-green-500"></i>
                                        </div>
                                        <input 
                                            class="w-full bg-gray-800/70 border-2 border-gray-700 rounded-xl py-3.5 pl-12 pr-4 text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-500/30 transition-all duration-300" 
                                            id="email" 
                                            type="email" 
                                            name="email" 
                                            placeholder="votre.email@exemple.com"
                                            value="{{ old('email') }}"
                                            required
                                        >
                                    </div>
                                    @error('email')
                                        <p class="text-red-400 text-xs mt-2 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Mot de passe & Confirmation -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div class="group">
                                        <label class="block text-sm font-bold text-gray-300 mb-2" for="password">
                                            Mot de passe
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <i class="fas fa-lock text-green-500"></i>
                                            </div>
                                            <input 
                                                class="w-full bg-gray-800/70 border-2 border-gray-700 rounded-xl py-3.5 pl-12 pr-10 text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-500/30 transition-all duration-300" 
                                                id="password" 
                                                type="password" 
                                                name="password" 
                                                placeholder="••••••••"
                                                required
                                            >
                                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                                <button type="button" class="text-gray-500 hover:text-green-400" onclick="togglePassword('password')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('password')
                                            <p class="text-red-400 text-xs mt-2 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="group">
                                        <label class="block text-sm font-bold text-gray-300 mb-2" for="password_confirmation">
                                            Confirmer
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <i class="fas fa-lock text-green-500"></i>
                                            </div>
                                            <input 
                                                class="w-full bg-gray-800/70 border-2 border-gray-700 rounded-xl py-3.5 pl-12 pr-10 text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-500/30 transition-all duration-300" 
                                                id="password_confirmation" 
                                                type="password" 
                                                name="password_confirmation" 
                                                placeholder="••••••••"
                                                required
                                            >
                                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                                <button type="button" class="text-gray-500 hover:text-green-400" onclick="togglePassword('password_confirmation')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('password_confirmation')
                                            <p class="text-red-400 text-xs mt-2 flex items-center">
                                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Newsletter Option -->
                                <div class="flex items-start p-4 bg-gray-800/50 rounded-xl">
                                    <input 
                                        type="checkbox" 
                                        class="w-5 h-5 text-green-600 bg-gray-700 border-gray-600 rounded focus:ring-2 focus:ring-green-500 mt-0.5" 
                                        name="newsletter" 
                                        id="newsletter"
                                        checked
                                    >
                                    <label for="newsletter" class="ml-3 text-sm text-gray-300">
                                        <span class="font-bold">Recevoir les offres exclusives</span>
                                        <p class="text-gray-400 text-xs mt-1">Soyez informé des promotions et des matchs à venir</p>
                                    </label>
                                </div>

                                <!-- Terms -->
                                <div class="flex items-start">
                                    <input 
                                        type="checkbox" 
                                        class="w-5 h-5 text-green-600 bg-gray-700 border-gray-600 rounded focus:ring-2 focus:ring-green-500 mt-0.5" 
                                        name="terms" 
                                        id="terms"
                                        required
                                    >
                                    <label for="terms" class="ml-3 text-sm text-gray-300">
                                        J'accepte les <a href="#" class="text-green-400 hover:text-green-300 font-bold">conditions d'utilisation</a> et la <a href="#" class="text-green-400 hover:text-green-300 font-bold">politique de confidentialité</a>
                                    </label>
                                </div>
                                @error('terms')
                                    <p class="text-red-400 text-xs mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror

                                <!-- Submit Button -->
                                <button 
                                    type="submit"
                                    class="w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-black py-4 px-6 rounded-xl shadow-2xl shadow-green-900/50 transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center space-x-3 mt-8 text-lg"
                                >
                                    <span>CRÉER MON COMPTE</span>
                                    <i class="fas fa-arrow-right text-white"></i>
                                </button>
                                
                                <div class="text-center mt-4">
                                    <p class="text-gray-400 text-sm">Vos données sont protégées par un cryptage SSL 256-bit</p>
                                    <div class="flex items-center justify-center mt-2 space-x-4">
                                        <i class="fas fa-shield-check text-green-500"></i>
                                        <i class="fab fa-cc-visa text-gray-400"></i>
                                        <i class="fab fa-cc-mastercard text-gray-400"></i>
                                        <i class="fab fa-cc-paypal text-gray-400"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-10 text-gray-500 text-sm">
                <div class="flex flex-wrap justify-center items-center gap-6 mb-4">
                    <a href="#" class="hover:text-green-400 transition-colors">Support Client</a>
                    <a href="#" class="hover:text-green-400 transition-colors">FAQ</a>
                    <a href="#" class="hover:text-green-400 transition-colors">Partenariats Stades</a>
                    <a href="#" class="hover:text-green-400 transition-colors">Revendeurs Officiels</a>
                </div>
                <p>© 2025 FootTicket . Plateforme officielle de réservation de tickets de football.</p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }
        
        // Form validation enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');
            
            form.addEventListener('submit', function(e) {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('password_confirmation').value;
                
                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Les mots de passe ne correspondent pas.');
                    return false;
                }
                
                // Animation on submit
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Création du compte...';
                submitBtn.disabled = true;
            });
        });
    </script>
</body>
</html>