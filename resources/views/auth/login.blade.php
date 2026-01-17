<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">FOOTTICKET

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootTicket- Connexion</title>
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
        
        .input-focus-effect:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
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
    <div class="absolute top-20 left-10 w-4 h-4 bg-green-500 rounded-full pulse-glow"></div>
    <div class="absolute top-1/3 right-20 w-6 h-6 bg-white rounded-full pulse-glow" style="animation-delay: 0.5s;"></div>
    <div class="absolute bottom-1/4 left-1/3 w-3 h-3 bg-green-400 rounded-full pulse-glow" style="animation-delay: 1s;"></div>
    <div class="absolute top-2/3 right-1/3 w-5 h-5 bg-white rounded-full pulse-glow" style="animation-delay: 1.5s;"></div>

    <!-- Main Content -->
    <div class="relative min-h-screen flex items-center justify-center p-4 py-12">
        <div class="w-full max-w-5xl">
            <!-- Header -->
            <div class="text-center mb-10 float-animation">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full shadow-2xl shadow-green-900/50 mb-6 border-4 border-white/10">
                    <i class="fas fa-ticket-alt text-3xl text-white"></i>
                </div>
                <h1 class="text-5xl font-black text-white mb-3 tracking-tight">
                    FOOT<span class="text-green-400">TICKET</span>
                </h1>
                <p class="text-gray-300 text-lg font-medium">Accédez à votre espace personnel</p>
                <div class="inline-flex items-center mt-4 px-4 py-2 bg-green-900/40 rounded-full border border-green-700/50">
                    <i class="fas fa-shield-alt text-green-400 mr-2 text-sm"></i>
                    <span class="text-green-300 text-sm font-medium">Connexion sécurisée</span>
                </div>
            </div>

            <!-- Main Card -->
            <div class="bg-gray-900/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-800 overflow-hidden max-w-2xl mx-auto">
                <div class="p-8 lg:p-10">
                    <!-- Ticket Stripe Effect -->
                    <div class="absolute top-0 right-0 w-24 h-full ticket-stripe rounded-r-2xl"></div>
                    
                    <div class="relative z-10">
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-white mb-2">Connexion</h2>
                            <p class="text-gray-400">Accédez à vos réservations et offres exclusives</p>
                        </div>

                        <form class="space-y-6" action="{{ route('login') }}" method="POST">
                            @csrf

                            <!-- Champ Email -->
                            <div class="group">
                                <label for="email" class="block text-sm font-bold text-gray-300 mb-2">
                                    Adresse Email
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-green-500"></i>
                                    </div>
                                    <input 
                                        id="email" 
                                        name="email" 
                                        type="email" 
                                        autocomplete="email"
                                        class="pl-12 block w-full pr-3 py-3.5 bg-gray-800/70 border-2 border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-green-500 input-focus-effect transition-all duration-300"
                                        placeholder="vous@exemple.com"
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

                            <!-- Champ Mot de passe -->
                            <div class="group">
                                <label for="password" class="block text-sm font-bold text-gray-300 mb-2">
                                    Mot de Passe
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-green-500"></i>
                                    </div>
                                    <input 
                                        id="password" 
                                        name="password" 
                                        type="password" 
                                        autocomplete="current-password"
                                        class="pl-12 block w-full pr-10 py-3.5 bg-gray-800/70 border-2 border-gray-700 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-green-500 input-focus-effect transition-all duration-300"
                                        placeholder="Votre mot de passe"
                                        required
                                    >
                                    <button type="button" 
                                            onclick="togglePassword()"
                                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-green-400 transition-colors">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="text-red-400 text-xs mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Options -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input 
                                        id="remember" 
                                        name="remember" 
                                        type="checkbox" 
                                        class="w-5 h-5 text-green-600 bg-gray-700 border-gray-600 rounded focus:ring-2 focus:ring-green-500"
                                    >
                                    <label for="remember" class="ml-3 block text-sm text-gray-300">
                                        Se souvenir de moi
                                    </label>
                                </div>

                                <div class="text-sm">
                                    <a href="#" class="font-bold text-green-400 hover:text-green-300 transition-colors">
                                        Mot de passe oublié ?
                                    </a>
                                </div>
                            </div>

                            <!-- Bouton de connexion -->
                            <div class="pt-4">
                                <button 
                                    type="submit" 
                                    class="w-full bg-gradient-to-r from-green-600 to-emerald-700 hover:from-green-700 hover:to-emerald-800 text-white font-bold py-4 px-6 rounded-xl shadow-2xl shadow-green-900/50 transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center space-x-3 text-lg"
                                >
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>SE CONNECTER</span>
                                </button>
                            </div>
                        </form>

                        <!-- Separator -->
                        <div class="my-8">
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-700"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-4 bg-gray-900 text-gray-500 font-medium">
                                        OU CONTINUER AVEC
                                    </span>
                                </div>
                            </div>
                        </div>

                 

                        <!-- Security Info -->
                        <div class="mt-8 p-4 bg-gray-800/50 rounded-xl border border-gray-700">
                            <div class="flex items-center justify-center space-x-6">
                                <div class="flex items-center">
                                    <i class="fas fa-shield-check text-green-500 mr-2"></i>
                                    <span class="text-gray-300 text-sm font-medium">SSL 256-bit</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-user-shield text-green-500 mr-2"></i>
                                    <span class="text-gray-300 text-sm font-medium">Données cryptées</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-green-500 mr-2"></i>
                                    <span class="text-gray-300 text-sm font-medium">Session 30min</span>
                                </div>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="mt-8 text-center pt-6 border-t border-gray-700">
                            <p class="text-gray-400">
                                Vous n'avez pas de compte ? 
                                <a href="/register" class="font-bold text-green-400 hover:text-green-300 ml-2 transition-colors">
                                    Inscrivez-vous maintenant
                                </a>
                            </p>
                            <p class="text-gray-500 text-sm mt-2">
                                Accédez aux offres exclusives et réservez vos places en avant-première
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-10 text-gray-500 text-sm">
                <div class="flex flex-wrap justify-center items-center gap-6 mb-4">
                    <a href="#" class="hover:text-green-400 transition-colors">Support 24/7</a>
                    <a href="#" class="hover:text-green-400 transition-colors">FAQ Tickets</a>
                    <a href="#" class="hover:text-green-400 transition-colors">Contact Stades</a>
                    <a href="#" class="hover:text-green-400 transition-colors">Mentions légales</a>
                </div>
                <p class="text-gray-600">
                    © 2025 FootTicket . Plateforme officielle de réservation de tickets de football.
                </p>
                <div class="flex items-center justify-center mt-4 space-x-6">
                    <i class="fab fa-cc-visa text-gray-500"></i>
                    <i class="fab fa-cc-mastercard text-gray-500"></i>
                    <i class="fab fa-cc-paypal text-gray-500"></i>
                    <i class="fab fa-cc-apple-pay text-gray-500"></i>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            const eyeIcon = passwordField.parentElement.querySelector('button i');
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        }
        
        // Form submission animation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');
            
            form.addEventListener('submit', function(e) {
                // Animation on submit
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> CONNEXION...';
                submitBtn.disabled = true;
                submitBtn.classList.remove('hover:from-green-700', 'hover:to-emerald-800', 'hover:scale-[1.02]');
            });
            
            // Auto-focus email field
            const emailField = document.getElementById('email');
            if (emailField && !emailField.value) {
                emailField.focus();
            }
        });
    </script>
</body>
</html>