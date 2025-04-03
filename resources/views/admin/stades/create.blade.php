<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Nouveau Stade</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-green-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-futbol text-2xl mr-2"></i>
                    <span class="font-bold text-xl">StadiumPro</span>
                </div>
                <div class="flex items-center">
                    <div class="relative ml-3">
                        <div>
                            <button class="flex text-sm rounded-full focus:outline-none">
                                <img class="h-8 w-8 rounded-full" src="/api/placeholder/32/32" alt="Avatar">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex items-center mb-6">
            <a href="#" class="text-green-600 hover:text-green-800 mr-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Ajouter un Nouveau Stade</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-green-50 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-800">Informations du Stade</h2>
                <p class="text-sm text-gray-500 mt-1">Remplissez les informations ci-dessous pour ajouter un nouveau stade à votre liste.</p>
            </div>

            <form class="p-6" method="POST" action= "{{ route('stades.store')}}" enctype="multipart/form-data">

                @csrf
                
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Nom du stade -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom du stade <span class="text-red-500">*</span></label>
                        <input type="text" id="nom" name="name"     
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Type de stade -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type de stade <span class="text-red-500">*</span></label>
                        <select id="type" name="type"  
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Sélectionner un type</option>
                            <option value="football">Football</option>
                            <option value="rugby">Rugby</option>
                            <option value="athletisme">Athlétisme</option>
                            <option value="multisport">Multisport</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <!-- Adresse -->
                    <div class="md:col-span-2">
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse <span class="text-red-500">*</span></label>
                        <input type="text" id="adresse" name="adresse" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">

                            @error('adresse')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Ville -->
                    <div>
                        <label for="ville" class="block text-sm font-medium text-gray-700 mb-1">Ville <span class="text-red-500">*</span></label>
                        <input type="text" id="ville" name="ville" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">

                            @error('ville')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Code postal -->
                    <div>
                        <label for="codePostal" class="block text-sm font-medium text-gray-700 mb-1">Code postal <span class="text-red-500">*</span></label>
                        <input type="text" id="codePostal" name="codePostal"   
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>

                    <!-- Capacité -->
                    <div>
                        <label for="capacite" class="block text-sm font-medium text-gray-700 mb-1">Capacité <span class="text-red-500">*</span></label>
                        <input type="number" id="capacite" name="capacity" min="0" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Année de construction -->
                    <div>
                        <label for="anneeConstruction" class="block text-sm font-medium text-gray-700 mb-1">Année de construction</label>
                        <input type="number" id="anneeConstruction" name="anneeConstruction" min="1900" max="2025"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>

                    <!-- Statut -->
                    <div>
                        <label for="statut" class="block text-sm font-medium text-gray-700 mb-1">Statut <span class="text-red-500">*</span></label>
                        <select id="statut" name="statut"  
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="disponible">Disponible</option>
                            <option value="maintenance">En maintenance</option>
                            <option value="reserve">Réservé</option>
                            <option value="ferme">Fermé</option>
                        </select>
                    </div>

                    <!-- Propriétaire -->
                    <div>
                        <label for="proprietaire" class="block text-sm font-medium text-gray-700 mb-1">Propriétaire</label>
                        <input type="text" id="proprietaire" name="proprietaire"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>

                    <!-- Image du stade -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image du stade</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="photo" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                        <span>Télécharger un fichier</span>
                                        <input id="photo" name="photo" type="file" class="sr-only" accept="image/*">
                                    </label>
                                </div>
                                <p class="pl-1">ou glisser-déposer</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                                @error('photo')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="4" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-200 pt-5">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Équipements et Installations</h3>
                    
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3">
                        <div class="flex items-center">
                            <input id="parking" name="installations[]" value="parking" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="parking" class="ml-2 block text-sm text-gray-700">Parking</label>
                        </div>
                        <div class="flex items-center">
                            <input id="vestiaires" name="installations[]" value="vestiaires" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="vestiaires" class="ml-2 block text-sm text-gray-700">Vestiaires</label>
                        </div>
                        <div class="flex items-center">
                            <input id="eclairage" name="installations[]" value="eclairage" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="eclairage" class="ml-2 block text-sm text-gray-700">Éclairage</label>
                        </div>
                        <div class="flex items-center">
                            <input id="restauration" name="installations[]" value="restauration" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="restauration" class="ml-2 block text-sm text-gray-700">Restauration</label>
                        </div>
                        <div class="flex items-center">
                            <input id="wifi" name="installations[]" value="wifi" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="wifi" class="ml-2 block text-sm text-gray-700">Wi-Fi</label>
                        </div>
                        <div class="flex items-center">
                            <input id="handicap" name="installations[]" value="handicap" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="handicap" class="ml-2 block text-sm text-gray-700">Accès handicapé</label>
                        </div>
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-200 pt-5">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Contact et Responsable</h3>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="contactNom" class="block text-sm font-medium text-gray-700 mb-1">Nom du responsable</label>
                            <input type="text" id="contactNom" name="contactNom"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="contactEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="contactEmail" name="contactEmail"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="contactTelephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                            <input type="tel" id="contactTelephone" name="contactTelephone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                    <button type="button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg mr-4 hover:bg-gray-300 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center">
                        <i class="fas fa-save mr-2"></i> Enregistrer le stade
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>