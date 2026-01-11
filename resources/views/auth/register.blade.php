<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FootTeam Manager - Inscription</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-500 to-blue-600 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-2xl rounded-xl p-8 w-full max-w-md">
        <div class="text-center mb-6">
            <i class="fas fa-futbol text-5xl text-green-600 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-800">FootTeam Manager</h2>
            <p class="text-gray-600 mt-2">Créez votre compte gestionnaire</p>
        </div>

    
        <!-- Formulaire d'inscription -->
        <form method="POST" action="{{ route('register') }}">
            @csrf <!-- Protection CSRF -->

            <!-- Champ Prénom -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                        Prénom
                    </label>
                    <input 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" 
                        id="prenom" 
                        type="text" 
                        name="prenom" 
                        placeholder="Votre prénom"
                        value="{{ old('prenom') }}"
                    >
                    @error('prenom')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Champ Nom -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                        Nom
                    </label>
                    <input 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" 
                        id="nom" 
                        type="text" 
                        name="nom" 
                        placeholder="Votre nom"
                        value="{{ old('nom') }}"
                    >
                    @error('nom')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Champ Email -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" 
                    id="email" 
                    type="email" 
                    name="email" 
                    placeholder="votre.email@exemple.com"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Rôle -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                    Rôle
                </label>
                <select 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500"
                    id="role"
                    name="role"
                >
                    <option value="Entraîneur">client</option>

                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ Mot de passe -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Mot de passe
                    </label>
                    <input 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" 
                        id="password" 
                        type="password" 
                        name="password" 
                        placeholder="******************"
                    >
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Champ Confirmation du mot de passe -->
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                        Confirmer
                    </label>
                    <input 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        placeholder="******************"
                    >
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Champ Conditions d'utilisation -->
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600" name="terms" required>
                    <span class="ml-2 text-gray-700 text-sm">
                        J'accepte les conditions d'utilisation
                    </span>
                </label>
                @error('terms')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton d'inscription -->
            <div class="flex items-center justify-between">
                <button 
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" 
                    type="submit"
                >
                    S'inscrire
                </button>
            </div>

            <!-- Lien de connexion -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    Déjà un compte ? 
                    <a href="login" class="text-blue-500 hover:text-blue-700">
                        Connectez-vous
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>