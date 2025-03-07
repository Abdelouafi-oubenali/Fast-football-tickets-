@extends('layouts.master')

@section('title','Création de Match')

@section('content')

    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-10 w-[76rem]" style="width: 76rem; margin-right:1rem; margin-top:2rem ">
        <!-- En-tête -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Créer une Nouvelle Équipe</h1>
            <p class="text-gray-600">Remplissez le formulaire ci-dessous pour créer une nouvelle équipe dans le système.</p>
        </div>

        <!-- Formulaire principal -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <form>
                <!-- Section d'information d'équipe -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informations de l'équipe</h2>
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="team-name" class="block text-sm font-medium text-gray-700 mb-1">Nom de l'équipe *</label>
                            <input type="text" id="team-name" name="team-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Département *</label>
                            <select id="department" name="department" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Sélectionner un département</option>
                                <option value="marketing">Marketing</option>
                                <option value="development">Développement</option>
                                <option value="design">Design</option>
                                <option value="sales">Commercial</option>
                                <option value="hr">Ressources Humaines</option>
                                <option value="finance">Finance</option>
                            </select>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description de l'équipe</label>
                            <textarea id="description" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Localisation</label>
                            <input type="text" id="location" name="location" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700 mb-1">Budget annuel (€)</label>
                            <input type="number" id="budget" name="budget" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>
                
                <!-- Section Chef d'équipe -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Chef d'équipe</h2>
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="team-lead" class="block text-sm font-medium text-gray-700 mb-1">Sélectionner un chef d'équipe *</label>
                            <select id="team-lead" name="team-lead" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Sélectionner un employé</option>
                                <option value="1">Sophie Martin</option>
                                <option value="2">Thomas Durand</option>
                                <option value="3">Julie Leroux</option>
                                <option value="4">Marc Dubois</option>
                                <option value="5">Émilie Laurent</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="lead-since" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                            <input type="date" id="lead-since" name="lead-since" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-600">Envoyer une notification au chef d'équipe</span>
                        </label>
                    </div>
                </div>
                
        
                
                <!-- Section Paramètres supplémentaires -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Paramètres supplémentaires</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="team-color" class="block text-sm font-medium text-gray-700 mb-1">Couleur de l'équipe</label>
                            <div class="flex items-center">
                                <input type="color" id="team-color" name="team-color" value="#3B82F6" class="h-8 w-8 rounded border border-gray-300 mr-2">
                                <span class="text-sm text-gray-600">Utilisée pour les visualisations et rapports</span>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Visibilité</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="visibility" value="public" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                                    <span class="ml-2 text-sm text-gray-700">Publique - Visible par tous les employés</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="visibility" value="department" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <span class="ml-2 text-sm text-gray-700">Département - Visible uniquement dans le département</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="visibility" value="private" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <span class="ml-2 text-sm text-gray-700">Privée - Visible uniquement par les membres</span>
                                </label>
                            </div>
                        </div>
                        
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">Activer les notifications pour cette équipe</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Créer l'équipe
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Aide et conseils -->
        <div class="mt-8 bg-blue-50 rounded-lg p-5 border border-blue-200">
            <h3 class="text-lg font-medium text-blue-800 mb-2">Conseils pour créer une équipe efficace</h3>
            <ul class="list-disc pl-5 space-y-2 text-sm text-blue-700">
                <li>Définissez clairement les objectifs et les responsabilités de l'équipe.</li>
                <li>Assurez-vous que les membres ont des compétences complémentaires.</li>
                <li>Établissez un processus clair pour la communication et la prise de décision.</li>
                <li>Prévoyez des moments réguliers pour les réunions d'équipe et les bilans.</li>
                <li>Documentez les processus et les ressources partagées de l'équipe.</li>
            </ul>
        </div>
    </div>
    @endsection