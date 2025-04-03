<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil | Système de Réservation</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .ticket-pattern {
            background-color: #f3f4f6;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23a5b4fc' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .ticket-background {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='20' viewBox='0 0 100 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M21.184 20c.357-.13.72-.264.888-.14 1.005-.174 1.837-.83 2.12-1.7.418-.604 1.658-.362 2.07.675.217.262.213.498.25.844.036.352.004.948-.903 1.32-.866.46-2.63-.102-3.037-.632-.4.526-1.068.598-1.618.597-.55-.001-1.97-.153-1.97-1.602-.73.001-.72-1.562-1.62-1.79-1.236-.314-1.63.885-1.98 1.77-1.91.177-.27.364-.287.672-.17.308-.23.07-.025-.264.004-.626-.55-1.05-1.098-1.05-1.72.004-.628.583-1.23 1.143-1.23.438 0 .308.46.483.73.36.538 1.568.204 1.442-.53-.097-.575-.54-.934-1.154-1.075-.275-.064-.7-.298-.945-.952-.075-.217-.118-.47-.37-.66-.2-.033-.096-.23-.16-.29-.63-.05-.167-.166-.167-.166s-.034-.245.1-.347c.134-.102.2-.15.2-.15s0-.113-.083-.18c-.084-.064-.17-.234-.17-.234s.077-.12.167-.14c.09-.023.114-.2.114-.2s-.087-.146-.148-.18c-.06-.037-.09-.22-.09-.22s.38-.09.134-.128c.096-.038.156-.197.156-.197s-.156-.057-.18-.093c-.027-.036-.09-.214-.09-.214s.102-.113.148-.138c.05-.023.1-.192.1-.192s-.11 0-.15-.02c-.08-.04-.16-.245-.16-.245s.11-.075.18-.092c.07-.016.15-.22.15-.22s-.19-.023-.21-.08c-.19-.058-.22-.27-.22-.27s.16-.044.19-.12c.02-.095.2-.15.2-.15s-.195.03-.21.014c-.02-.015-.17-.27-.17-.27s.04-.125.11-.15c.08-.03.2-.23.2-.23l-.18-.01c-.05-.005-.11-.246-.11-.246l.16-.073c.06-.03.08-.145.08-.145s-.08.01-.17-.02c-.08-.03-.17-.243-.17-.243s.15-.057.22-.07c.07-.01.11-.19.11-.19s-.2.01-.24-.03c-.04-.04-.13-.29-.13-.29s.16.02.2-.03c.03-.04.17-.2.17-.2s-.19.08-.24.03c-.05-.05-.17-.32-.17-.32s.19.05.25.02c.06-.03.13-.17.13-.17s-.13.04-.23-.06c-.11-.097-.21-.33-.21-.33s.18.056.29.01c.11-.044.23-.135.23-.135s-.25-.062-.28-.175c-.03-.112.02-.306.02-.306s.14.08.28.05c.14-.03.26-.16.26-.16s-.28-.06-.31-.21c-.03-.157.01-.468.01-.468s.21.094.36.039c.15-.056.17-.123.17-.123s-.24-.137-.27-.222c-.04-.084-.01-.34-.01-.34s.18.103.3.065c.11-.038.28-.168.28-.168s-.28-.145-.32-.268c-.03-.123-.01-.425-.01-.425s.24.133.32.108c.08-.025.3-.148.3-.148s-.33-.127-.35-.25c-.03-.12-.03-.505-.03-.505s.25.138.37.098c.11-.04.23-.115.23-.115s-.32-.195-.36-.307c-.04-.11-.04-.404-.04-.404s.3.17.4.134c.09-.035.19-.085.19-.085s-.22-.19-.27-.38c-.05-.19-.05-.48-.05-.48s.33.18.44.14c.1-.04.32-.19.32-.19l-.43-.25c-.08-.14-.09-.28-.09-.28l.38.16c.11.05.26.06.26.06l-.33-.21c-.08-.11-.15-.38-.15-.38l.45.23c.14.03.38.05.38.05l-.36-.2c-.11-.11-.17-.26-.17-.26l.43.13c.15.02.35.02.35.02l-.37-.18c-.19-.11-.23-.33-.23-.33l.44.14c.16.04.44.01.44.01l-.45-.16c-.15-.09-.3-.33-.3-.33l.53.19.43-.02-.54-.2c-.17-.14-.23-.31-.23-.31l.49.14.46-.09-.52-.17c-.16-.11-.26-.3-.26-.3l.51.15.53-.14-.7-.24c-.25-.12-.3-.28-.3-.28l.48.09c.15.03.53-.06.53-.06l-.59-.17c-.17-.1-.32-.38-.32-.38l.48.17.44-.05-.64-.3-.5-.33.6.19c.2.04.5-.05.5-.05l-.55-.19c-.18-.1-.3-.36-.3-.36l.54.18.61-.11-.83-.3c-.24-.15-.32-.38-.32-.38l.53.16c.2.05.57-.03.57-.03l-.64-.26c-.15-.1-.2-.3-.2-.3l.53.13.52-.08-.69-.32c-.15-.1-.19-.22-.19-.22l.47.08c.14.03.5-.06.5-.06l-.5-.19c-.17-.11-.24-.34-.24-.34l.55.16.39-.03-.7-.38-.61-.34h.74l.34-.02-.8-.27c-.3-.17-.41-.51-.41-.51l.45.16c.14.04.51-.04.51-.04l-.53-.25c-.14-.1-.25-.27-.25-.27l.47.11.53-.09-.75-.41c-.21-.15-.35-.46-.35-.46l.48.18c.18.05.67-.06.67-.06l-.7-.33c-.16-.13-.24-.36-.24-.36l.45.11.53-.06-.7-.34c-.22-.16-.36-.42-.36-.42l.56.17.55-.08-.87-.36c-.22-.19-.31-.45-.31-.45l.5.12.66-.1-.53-.22c-.09-.06-.2-.25-.23-.29-.04-.65.08-.18.08-.18l.44.11c.11.03.31-.02.31-.02l-.45-.19c-.1-.07-.21-.29-.21-.29l.4.1h.25l-.42-.23c-.05-.05-.09-.21-.09-.21l.28.07h.21l-.3-.16c-.06-.04-.13-.24-.13-.24l.26.08h.19l-.18-.14c-.03-.04-.18-.25-.18-.25l.15.06s.78-.12.87-.12c.32 0 .89.44.89.44' fill='%23818cf8' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="ticket-pattern min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Éléments décoratifs -->
        <div class="absolute top-0 left-0 w-full h-64 bg-indigo-600 opacity-10 -z-10"></div>
        
        <div class="relative mb-6">
            <div class="absolute -top-4 -left-4 w-16 h-16 bg-yellow-400 rounded-full opacity-20"></div>
            <div class="absolute -bottom-2 -right-2 w-24 h-24 bg-purple-500 rounded-full opacity-20"></div>
            <h1 class="text-3xl font-bold text-center text-gray-800 relative z-10">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                    Système de Réservation de Tickets
                </span>
            </h1>
        </div>
        
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-t-lg p-6 shadow-lg relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 transform rotate-45 translate-x-8 -translate-y-8 bg-white opacity-10"></div>
            <div class="relative z-10">
                <h2 class="text-2xl font-bold text-white">Modifier Profil</h2>
                <p class="text-indigo-100">Mettez à jour vos informations personnelles</p>
            </div>
        </div>
        
        <div class="bg-white shadow-xl rounded-b-lg p-6 relative ticket-background" 
             x-data="{
                photoPreview: '{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default-avatar.png') }}',
                showPassword: false,
                showConfirmPassword: false
             }">
            <!-- Éléments visuels thématiques -->
            <div class="absolute top-5 right-5 w-24 h-8 border-2 border-dashed border-indigo-200 rounded-full opacity-50"></div>
            <div class="absolute bottom-5 left-5 w-16 h-16 border-2 border-dotted border-purple-200 rounded-full opacity-40"></div>
            
            <!-- Notifications -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    {{ session('success') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <!-- Section Photo -->
                <div class="flex flex-col sm:flex-row items-center gap-6 pb-6 border-b border-gray-200">
                    <div class="relative group">
                        <div class="h-28 w-28 rounded-full overflow-hidden ring-4 ring-indigo-100 shadow-md">
                            <img id="preview" src="{{ asset('storage/' . $user->photo) }}" alt="Photo de profil" class="h-full w-full object-cover">
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-40 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <label for="photo_profile" class="text-white text-xs font-medium cursor-pointer p-2 text-center">
                                Modifier
                                <input id="photo_profile" name="photo" type="file" class="hidden" accept="image/*" 
                                    @change="const file = $event.target.files[0]; 
                                    if (file && file.size <= 2097152) { 
                                        photoPreview = URL.createObjectURL(file);
                                    } else if (file.size > 2097152) {
                                        alert('Le fichier est trop volumineux (max 2MB)');
                                        $event.target.value = '';
                                    }">
                            </label>
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900">Photo de profil</h3>
                        <p class="text-sm text-gray-500">Formats acceptés: PNG, JPG ou GIF (max 2MB)</p>
                    </div>
                </div>
                
                <!-- Section Informations -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Nom complet -->
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom complet*</label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom', $user->nom) }}" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white bg-opacity-90">
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white bg-opacity-90">
                    </div>
                    
                    <!-- Téléphone -->
                    <div>
                        <label for="number_phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input type="tel" id="number_phone" name="number_phone" value="{{ old('number_phone', $user->number_phone) }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white bg-opacity-90">
                    </div>
                    
                    <!-- Adresse -->
                    <div>
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                        <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $user->adresse) }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white bg-opacity-90">
                    </div>

                    <!-- À propos -->
                    <div class="sm:col-span-2">
                        <label for="About" class="block text-sm font-medium text-gray-700 mb-1">À propos de moi</label>
                        <textarea id="About" name="About" rows="3"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white bg-opacity-90">{{ old('About', $user->About) }}</textarea>
                    </div>               
                </div>
                
                <!-- Boutons d'action -->
                <div class="flex justify-between pt-6">
                    <div>
                        <p class="text-xs text-gray-500">* Champs obligatoires</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('profile.index', $user->id) }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Annuler
                        </a>
                        <button type="submit" class="relative px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 overflow-hidden transition-colors">
                            <span class="relative z-10">Enregistrer les modifications</span>
                            <span class="absolute top-0 right-0 w-12 h-12 transform rotate-45 translate-x-6 -translate-y-6 bg-white opacity-10"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Élément visuel ticket -->
        <div class="max-w-xs mx-auto mt-8 flex justify-center opacity-70">
            <div class="h-4 w-16 border-2 border-dashed border-indigo-300 rounded-full"></div>
        </div>
    </div>
</body>
</html>