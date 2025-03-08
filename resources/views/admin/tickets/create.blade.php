<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Création de Tickets de Football</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col">
        <!-- Header avec navigation -->
        <header class="bg-blue-800 text-white shadow-md">
            <div class="container mx-auto px-4 py-3">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold">FootTicket Admin</h1>
                    </div>
                    <nav class="hidden md:flex space-x-6">
                        <a href="#" class="py-2 hover:text-blue-200">Tableau de bord</a>
                        <a href="#" class="py-2 border-b-2 border-white font-medium">Tickets</a>
                        <a href="#" class="py-2 hover:text-blue-200">Matchs</a>
                        <a href="#" class="py-2 hover:text-blue-200">Stades</a>
                        <a href="#" class="py-2 hover:text-blue-200">Statistiques</a>
                    </nav>
                    <div class="flex items-center space-x-3">
                        <span>Admin</span>
                        <button class="p-1 rounded-full bg-blue-700 hover:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="flex-grow">
            <div class="container mx-auto px-4 py-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Création de Nouveaux Tickets</h2>
                    <div class="flex space-x-2">
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md">Annuler</button>
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Enregistrer</button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <!-- Formulaire pour créer un nouveau ticket -->
                    <form>
                        <!-- Informations du match -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Informations du Match</h3>
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                                <div>
                                    <label for="equipe_domicile" class="block text-gray-700 mb-1">Équipe Domicile</label>
                                    <select id="equipe_domicile" name="equipe_domicile" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">-- Sélectionner une équipe --</option>
                                        <option value="psg">Paris Saint-Germain</option>
                                        <option value="om">Olympique de Marseille</option>
                                        <option value="ol">Olympique Lyonnais</option>
                                        <option value="asm">AS Monaco</option>
                                        <option value="srfc">Stade Rennais FC</option>
                                        <option value="losc">LOSC Lille</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="equipe_exterieur" class="block text-gray-700 mb-1">Équipe Extérieur</label>
                                    <select id="equipe_exterieur" name="equipe_exterieur" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">-- Sélectionner une équipe --</option>
                                        <option value="psg">Paris Saint-Germain</option>
                                        <option value="om">Olympique de Marseille</option>
                                        <option value="ol">Olympique Lyonnais</option>
                                        <option value="asm">AS Monaco</option>
                                        <option value="srfc">Stade Rennais FC</option>
                                        <option value="losc">LOSC Lille</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="competition" class="block text-gray-700 mb-1">Compétition</label>
                                    <select id="competition" name="competition" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">-- Sélectionner une compétition --</option>
                                        <option value="l1">Ligue 1</option>
                                        <option value="cdf">Coupe de France</option>
                                        <option value="cdl">Coupe de la Ligue</option>
                                        <option value="ucl">Ligue des Champions</option>
                                        <option value="uel">Ligue Europa</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="stade" class="block text-gray-700 mb-1">Stade</label>
                                    <select id="stade" name="stade" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">-- Sélectionner un stade --</option>
                                        <option value="parc">Parc des Princes</option>
                                        <option value="velodrome">Orange Vélodrome</option>
                                        <option value="groupama">Groupama Stadium</option>
                                        <option value="louis2">Stade Louis-II</option>
                                        <option value="roazhon">Roazhon Park</option>
                                        <option value="pierre-mauroy">Stade Pierre-Mauroy</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="date_match" class="block text-gray-700 mb-1">Date du Match</label>
                                    <input type="date" id="date_match" name="date_match" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="heure_match" class="block text-gray-700 mb-1">Heure du Match</label>
                                    <input type="time" id="heure_match" name="heure_match" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Détails de billetterie -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Détails de Billetterie</h3>
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                                <div>
                                    <label for="ref_match" class="block text-gray-700 mb-1">Référence du Match</label>
                                    <input type="text" id="ref_match" name="ref_match" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="code_billetterie" class="block text-gray-700 mb-1">Code Billetterie</label>
                                    <input type="text" id="code_billetterie" name="code_billetterie" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="date_ouverture" class="block text-gray-700 mb-1">Date d'Ouverture Vente</label>
                                    <input type="date" id="date_ouverture" name="date_ouverture" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarifs par catégorie -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Tarifs par Catégorie</h3>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="border px-4 py-2 text-left">Catégorie</th>
                                            <th class="border px-4 py-2 text-left">Prix Standard (€)</th>
                                            <th class="border px-4 py-2 text-left">Prix Abonné (€)</th>
                                            <th class="border px-4 py-2 text-left">Places Disponibles</th>
                                            <th class="border px-4 py-2 text-left">Actif</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-2">Catégorie 1 (Premium)</td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_cat1" value="120" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_abo_cat1" value="90" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="places_cat1" value="1500" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2 text-center">
                                                <input type="checkbox" name="actif_cat1" checked class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Catégorie 2</td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_cat2" value="90" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_abo_cat2" value="70" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="places_cat2" value="2500" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2 text-center">
                                                <input type="checkbox" name="actif_cat2" checked class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Catégorie 3</td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_cat3" value="60" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_abo_cat3" value="45" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="places_cat3" value="5000" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2 text-center">
                                                <input type="checkbox" name="actif_cat3" checked class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2">Catégorie 4</td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_cat4" value="30" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="prix_abo_cat4" value="20" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2">
                                                <input type="number" name="places_cat4" value="8000" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                            </td>
                                            <td class="border px-4 py-2 text-center">
                                                <input type="checkbox" name="actif_cat4" checked class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Options et services additionnels -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Options et Services Additionnels</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="p-4 border rounded-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <label for="parking_toggle" class="font-medium">Parking</label>
                                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                            <input type="checkbox" id="parking_toggle" name="parking_actif" checked class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                            <label for="parking_toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-sm text-gray-700 mb-1">Prix (€)</label>
                                        <input type="number" name="prix_parking" value="15" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-sm text-gray-700 mb-1">Places disponibles</label>
                                        <input type="number" name="places_parking" value="500" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                    </div>
                                </div>
                                
                                <div class="p-4 border rounded-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <label for="programme_toggle" class="font-medium">Programme Match</label>
                                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                            <input type="checkbox" id="programme_toggle" name="programme_actif" checked class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                            <label for="programme_toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-sm text-gray-700 mb-1">Prix (€)</label>
                                        <input type="number" name="prix_programme" value="5" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-sm text-gray-700 mb-1">Quantité disponible</label>
                                        <input type="number" name="qte_programme" value="2000" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                    </div>
                                </div>
                                
                                <div class="p-4 border rounded-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <label for="assurance_toggle" class="font-medium">Assurance Annulation</label>
                                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                            <input type="checkbox" id="assurance_toggle" name="assurance_actif" checked class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                            <label for="assurance_toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-sm text-gray-700 mb-1">Prix (€)</label>
                                        <input type="number" name="prix_assurance" value="8" min="0" class="w-full px-2 py-1 border border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Paramètres supplémentaires -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Paramètres Supplémentaires</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <input type="checkbox" id="limit_tickets" name="limit_tickets" class="mt-1 h-4 w-4 text-blue-600">
                                    <label for="limit_tickets" class="ml-2 block text-gray-700">Limiter le nombre de billets par transaction</label>
                                </div>
                                <div class="ml-6">
                                    <label class="block text-sm text-gray-700 mb-1">Nombre maximum de billets par transaction</label>
                                    <input type="number" name="max_tickets" value="4" min="1" class="w-40 px-2 py-1 border border-gray-300 rounded-md">
                                </div>
                                
                                <div class="flex items-start">
                                    <input type="checkbox" id="display_map" name="display_map" checked class="mt-1 h-4 w-4 text-blue-600">
                                    <label for="display_map" class="ml-2 block text-gray-700">Afficher le plan du stade lors de la sélection des places</label>
                                </div>
                                
                                <div class="flex items-start">
                                    <input type="checkbox" id="allow_resale" name="allow_resale" checked class="mt-1 h-4 w-4 text-blue-600">
                                    <label for="allow_resale" class="ml-2 block text-gray-700">Autoriser la revente des billets sur la plateforme officielle</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Notes internes -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Notes Internes</h3>
                            <textarea name="notes_internes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Notes visibles uniquement par l'équipe administrative..."></textarea>
                        </div>
                    </form>
                </div>
                
                <div class="flex justify-end space-x-2">
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md">Annuler</button>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Prévisualiser</button>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">Créer les tickets</button>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-gray-300 py-4">
            <div class="container mx-auto px-4 text-sm">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div>&copy; 2025 FootTicket Admin. Tous droits réservés.</div>
                    <div class="mt-2 md:mt-0">
                        <a href="#" class="text-gray-300 hover:text-white mx-2">Aide</a>
                        <a href="#" class="text-gray-300 hover:text-white mx-2">Support</a>
                        <a href="#" class="text-gray-300 hover:text-white mx-2">Documentation</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <style>
        .toggle-checkbox:checked {
            right: 0;
            border-color: #3B82F6;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #3B82F6;
        }
    </style>
</body>
</html>