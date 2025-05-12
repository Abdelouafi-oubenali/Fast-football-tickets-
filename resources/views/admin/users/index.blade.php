<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Utilisateurs</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-green-900 to-green-800 flex items-center justify-center p-4 " >
  <div class="w-full max-w-4xl">
    <div class="text-center mb-16">
      <div class="inline-block p-3 rounded-full bg-white/10 backdrop-blur-sm mb-6">
        <i class="fas fa-users text-4xl text-white"></i>
      </div>
      <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-200 to-cyan-200 mb-4">
        Gestion des Utilisateurs
      </h1>
      <p class="text-purple-200 text-lg max-w-2xl mx-auto">
        Gérez facilement les profils organisateurs et clients avec notre interface intuitive
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <!-- Carte Organisateur -->
      <div class="bg-white rounded-xl overflow-hidden shadow-2xl" style="width: 29rem; margin-left: -2rem;">
        <div class="p-6">
          <div class="flex items-center mb-6">
            <div class="p-2 bg-green-600 rounded-lg mr-3">
              <i class="fas fa-calendar-alt text-white text-xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Organisateur</h2>
          </div>
          
          <div class="bg-gray-100 rounded-lg shadow-md p-6 mb-8">
            <div class="divide-y divide-gray-300">
              <div class="py-6 flex flex-col sm:flex-row">
                <div class="h-48 w-full sm:w-48 bg-gray-200 rounded-lg overflow-hidden mb-4 sm:mb-0">
                  <img src="https://i.pinimg.com/736x/4a/0a/39/4a0a39c5c5f0971a9131bddb213aaf25.jpg" alt="Photo de profil organisateur" class="h-full w-[12rem] object-cover">
                </div>
              </div>
            </div>
            
            <div class="mt-6 pt-6 border-t border-gray-300">
              <div class="flex justify-between items-center">
                <form action="{{ route('manage.users', ['userRequest' => 1]) }}" method="POST">
                    @csrf
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-105" style="width: 100%">
                        Gérer les Organisateur
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <!-- Carte Client -->
      <div class="bg-white rounded-xl overflow-hidden shadow-2xl w-[27rem]" style="width: 29rem;">
        <div class="p-6">
          <div class="flex items-center mb-6">
            <div class="p-2 bg-cyan-600 rounded-lg mr-3">
              <i class="fas fa-user text-white text-xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Client</h2>
          </div>
          
          <div class="bg-gray-100 rounded-lg shadow-md p-6 mb-8">
            <div class="divide-y divide-gray-300">
              <div class="py-6 flex flex-col sm:flex-row">
                <div class="h-48 w-full sm:w-48 bg-gray-200 rounded-lg overflow-hidden mb-4 sm:mb-0">
                  <img src="https://i.pinimg.com/736x/09/db/22/09db22891428315402565870a57152fb.jpg" alt="Photo de profil client" class="h-full w-[12rem] object-cover">
                </div>
              </div>
            </div>
            
            <div class="mt-6 pt-6 border-t border-gray-300">
              <div class="flex justify-between items-center">
            <form action="{{ route('manage.users', ['userRequest' => 2]) }}" method="POST">
                @csrf
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-105" style="width: 100%">
                  Gérer les Client
                </button>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
    <div class="text-center mt-12">
      <p class="text-purple-200">
        <i class="fas fa-question-circle mr-1"></i>
        Besoin d'aide ? <a href="#" class="text-white hover:text-cyan-200 underline transition">Contactez notre support</a>
      </p>
    </div>
  </div>
</div>
</html>