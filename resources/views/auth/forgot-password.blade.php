<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe - FootTickets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-green-500 to-blue-600 min-h-screen flex items-center justify-center p-4">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full bg-white rounded-lg shadow-xl overflow-hidden">
            <!-- Header avec gradient aux couleurs de football -->
            <div class="bg-gradient-to-r from-blue-800 to-blue-600 px-6 py-8 text-center">
                <div class="inline-block bg-white p-2 rounded-full mb-4">
                    <!-- Logo placeholder -->
                    <svg class="w-12 h-12 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-14.5h2v1h-2zm0 2.5h2v8h-2z"/>
                    </svg>
                </div>
                <h1 class="text-xl font-bold text-white">Réinitialisation de mot de passe</h1>
                <p class="text-blue-100 mt-2">FootTickets - Votre portail vers les matchs</p>
            </div>
            
            <!-- Formulaire -->
            <div class="p-6">
                <p class="text-gray-600 text-sm mb-6">
                    Veuillez entrer votre adresse e-mail ci-dessous. Nous vous enverrons un lien pour réinitialiser votre mot de passe.
                </p>
                
                <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Adresse e-mail
                        </label>
                        <input type="email" id="email" name="email" required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            placeholder="votre@email.com">
                    </div>
                    
                    <div>
                        <button type="submit" 
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                            Envoyer le lien de réinitialisation
                        </button>
                    </div>
                </form>
                
                <div class="mt-6 flex items-center justify-center">
                    <div class="text-sm">
                        <a href="/login" class="font-medium text-blue-600 hover:text-blue-500">
                            Retour à la connexion
                        </a>
                    </div>
                </div>
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