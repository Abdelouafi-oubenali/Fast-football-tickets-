<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Profil Utilisateur</title>
</head>
<body class="bg-gray-50">
    <div class="max-w-6xl mx-auto p-4 md:p-6 lg:p-8">
        <!-- Profile Header Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Cover Image with Gradient -->
            <div class="relative">
                <div class="h-56 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                <div class="absolute bottom-0 left-6 transform translate-y-1/2">
                    <div class="p-1 bg-white rounded-full shadow-lg">
                        <img class="rounded-full w-32 h-32 object-cover border-4 border-white" 
                             src="{{ asset('storage/' . $user->photo) }}" 
                             alt="Photo de profil">
                    </div>
                </div>
                <!-- Action buttons -->
                <div class="absolute top-4 right-4 flex space-x-2">
                    <a href="/profil/{{$user->id}}/edit" class="bg-white text-gray-700 hover:bg-gray-100 transition px-4 py-2 rounded-lg shadow-md flex items-center">
                        <i class="fas fa-pencil-alt mr-2"></i> Modifier
                    </a>
                </div>
            </div>
            
            <!-- Profile Info -->
            <div class="pt-20 px-6 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">{{ $user->nom }} {{ $user->prenom }}</h1>
                        <p class="text-gray-600 flex items-center mt-1">
                            <i class="fas fa-envelope mr-2"></i>{{ $user->email }}
                        </p>
                        <p class="text-gray-700 font-medium mt-2">
                            <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">
                                {{ $user->role }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Info Card -->
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ tab: 'info' }">
                    <div class="flex border-b border-gray-200 mb-4">
                        <button 
                            @click="tab = 'info'" 
                            :class="{'text-indigo-600 border-b-2 border-indigo-600 -mb-px': tab === 'info'}"
                            class="py-2 px-4 font-medium">
                            Intro
                        </button>
                        <button 
                            @click="tab = 'permissions'" 
                            :class="{'text-indigo-600 border-b-2 border-indigo-600 -mb-px': tab === 'permissions'}"
                            class="py-2 px-4 font-medium">
                            Permissions
                        </button>
                    </div>
                    
                    <div x-show="tab === 'info'" class="space-y-3 text-gray-600">
                        <p class="flex items-center">
                            <i class="fas fa-briefcase w-6 text-gray-500"></i>
                            <span class="ml-2">Web Developer at YouCode</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-graduation-cap w-6 text-gray-500"></i>
                            <span class="ml-2">Studied at Local University</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-home w-6 text-gray-500"></i>
                            <span class="ml-2">Lives in Casablanca, Morocco</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-phone w-6 text-gray-500"></i>
                            <span class="ml-2">{{ $user->number_phone }}</span>
                        </p>
                    </div>
                    
                    <div x-show="tab === 'permissions'" class="space-y-2">
                        <div class="flex items-center p-2 hover:bg-gray-50 rounded">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Ajout de tickets</span>
                        </div>
                        <div class="flex items-center p-2 hover:bg-gray-50 rounded">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Gestion des tickets</span>
                        </div>
                        <div class="flex items-center p-2 hover:bg-gray-50 rounded">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Supprimer des utilisateurs</span>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Card -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Statistiques</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <p class="text-2xl font-bold text-indigo-600">24</p>
                            <p class="text-sm text-gray-600">Tickets créés</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <p class="text-2xl font-bold text-green-600">18</p>
                            <p class="text-sm text-gray-600">Résolus</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <p class="text-2xl font-bold text-yellow-600">6</p>
                            <p class="text-sm text-gray-600">En attente</p>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <p class="text-2xl font-bold text-blue-600">85%</p>
                            <p class="text-sm text-gray-600">Taux de résolution</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- About Section -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold">À propos</h3>
                        <button class="text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    <p class="text-gray-600 leading-relaxed">
                        {{$user->About}}
                    </p>
                </div>
                
                <!-- Personal Information -->
                <div class="bg-white p-6 rounded-xl shadow-md" x-data="{ open: true }">
                    <div class="flex justify-between items-center mb-4 cursor-pointer" @click="open = !open">
                        <h3 class="text-xl font-semibold">Mes Informations</h3>
                        <button class="text-gray-500">
                            <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>
                    </div>
                    
                    <div x-show="open" class="space-y-6 transition-all duration-300">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <div class="flex flex-col">
                                    <span class="text-sm text-gray-500">Nom</span>
                                    <span class="font-medium">{{$user->nom}}</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm text-gray-500">Prénom</span>
                                    <span class="font-medium">{{$user->prenom}}</span>
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <div class="flex flex-col">
                                    <span class="text-sm text-gray-500">Email</span>
                                    <span class="font-medium">{{$user->email}}</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm text-gray-500">Téléphone</span>
                                    <span class="font-medium">{{$user->number_phone}}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <span class="text-sm text-gray-500">Adresse</span>
                            <p class="font-medium">{{$user->adresse}}</p>
                        </div>
                        
                        <div>
                            <span class="text-sm text-gray-500">Rôle</span>
                            <p class="font-medium">{{$user->role}}</p>
                        </div>
                        
                        <div class="flex justify-center mt-4">
                            <a href="/profil/{{$user->id}}/edit" 
                               class="bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
                                <i class="fas fa-user-edit mr-2"></i> Mettre à jour mon profil
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Activity Section -->
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Activité récente</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div>
                                <p class="font-medium">Ticket créé: <span class="text-blue-600">#12345</span></p>
                                <p class="text-sm text-gray-600">Problème avec l'imprimante</p>
                                <p class="text-xs text-gray-500 mt-1">Il y a 2 jours</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="bg-green-100 p-2 rounded-full text-green-600">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <p class="font-medium">Ticket résolu: <span class="text-blue-600">#12340</span></p>
                                <p class="text-sm text-gray-600">Configuration du réseau</p>
                                <p class="text-xs text-gray-500 mt-1">Il y a 4 jours</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="bg-yellow-100 p-2 rounded-full text-yellow-600">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div>
                                <p class="font-medium">Commentaire ajouté: <span class="text-blue-600">#12338</span></p>
                                <p class="text-sm text-gray-600">Merci pour la résolution rapide!</p>
                                <p class="text-xs text-gray-500 mt-1">Il y a 1 semaine</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-center">
                        <button class="text-indigo-600 hover:text-indigo-800 font-medium">
                            Voir toute l'activité
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Additional interactive functionality could be added here
    </script>
</body>
</html>