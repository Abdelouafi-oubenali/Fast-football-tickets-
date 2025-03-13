<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full bg-white rounded-lg shadow-xl overflow-hidden">
            <!-- Header avec gradient aux couleurs de football -->
            <div class="bg-gradient-to-r from-blue-800 to-blue-600 px-6 py-8 text-center">
                <div class="inline-block bg-gray-800 p-3 rounded-full mb-3 border-2 border-white">
                    <!-- Icône de ballon de football -->
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a8 8 0 100 16 8 8 0 000-16z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v4m0 12v-4m-8-4h4m12 0h-4m-6 0c0 1.105.895 2 2 2s2-.895 2-2-.895-2-2-2-2 .895-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-xl font-bold text-white">Réinitialisation du mot de passe</h1>
                <p class="text-blue-100 mt-2">FootTickets - Votre portail vers les matchs</p>
            </div>
            
            <!-- Formulaire -->
            <div class="p-6">
                <p class="text-gray-600 text-sm mb-6">
                    Veuillez compléter tous les champs ci-dessous pour créer un nouveau mot de passe.
                </p>
                
                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Adresse e-mail :
                        </label>
                        <input type="email" id="email" name="email" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            placeholder="votre@email.com">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Nouveau mot de passe :
                        </label>
                        <input type="password" id="password" name="password" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Confirmer le mot de passe :
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    
                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                            Réinitialiser le mot de passe
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-gray-700 text-sm">Aide</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 text-sm">Contact</a>
                </div>
                <div>
                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                        Sécurisé
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>