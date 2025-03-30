
    <!-- Sidebar -->
    <header class="fixed top-0 right-0 left-64 bg-white shadow-md z-50">
        <div class="flex justify-between items-center px-8 py-4">
            <!-- Logo et titre -->
            <div class="flex items-center space-x-4">
                <div class="bg-green-600 text-white p-2 rounded-full">
                    ⚽
                </div>
                <h1 class="text-xl font-bold">Gestion des Billets</h1>
            </div>
            
            <!-- Menu central -->
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-600 hover:text-green-600">Accueil</a>
                <a href="#" class="text-gray-600 hover:text-green-600">Matchs</a>
                <a href="#" class="text-gray-600 hover:text-green-600">Rapports</a>
                <a href="#" class="text-gray-600 hover:text-green-600">Support</a>
            </nav>
    
            <!-- Menu utilisateur -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative">
                    <button class="p-2 text-gray-600 hover:text-green-600">
                        🔔
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-4 h-4">
                            3
                        </span>
                    </button>
                </div>
    
                <!-- Profil -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <img src="/api/placeholder/32/32" alt="Photo de profil" class="w-8 h-8 rounded-full bg-gray-200">
                        <div class="hidden md:block">
                            <div class="text-sm font-medium">Admin User</div>
                            <div class="text-xs text-gray-500">Gestionnaire</div>
                        </div>
                    </div>
                    
                    <!-- Bouton de déconnexion -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf 
                        <button
                            type="submit"
                            class="px-4 py-2 text-red-600 hover:text-white hover:bg-red-600 rounded-lg border border-red-600 transition-colors duration-300">
                            Déconnexion
                        </button>
                    </form>
                 
                </div>
            </div>
        </div>
    </header>
