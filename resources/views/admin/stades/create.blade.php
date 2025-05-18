@extends('layouts.master')

@section('title','Création de stads')

@section('content')

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 ml-[20rem]">
        <div class="flex items-center mb-6">
            <a href="#" class="text-green-600 hover:text-green-800 mr-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Ajouter un Nouveau Stade</h1>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-[70rem]">
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

                  

                    <!-- Capacité -->
                    <div>
                        <label for="capacite" class="block text-sm font-medium text-gray-700 mb-1">Capacité <span class="text-red-500">*</span></label>
                        <input type="number" id="capacite" name="capacity" min="0" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
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
    @endsection