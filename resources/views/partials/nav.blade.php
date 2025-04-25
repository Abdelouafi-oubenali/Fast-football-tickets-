
<nav class="fixed top-0 left-0 h-full w-72 bg-gradient-to-br from-green-800 to-green-900 p-5 shadow-xl transition-all duration-300 ease-in-out">
    <div class="flex items-center space-x-3 text-white text-xl font-bold mb-10 px-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
        </svg>
        <span class="font-extrabold tracking-wider">FootTicket
        </span>
    </div>
    
    <div class="mb-8">
        <div class="px-2 mb-3 text-green-300 uppercase text-xs font-semibold tracking-wider">Navigation</div>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard.admin') }}" class="flex items-center text-gray-200 hover:text-white py-3 px-4 rounded-lg hover:bg-green-700/60 transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-300 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Tableau de bord</span>
                </a>
            </li>

            <li>
                <a href="/vente-de-tickets" class="flex items-center text-gray-200 hover:text-white py-3 px-4 rounded-lg hover:bg-green-700/60 transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-300 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    <span>Vente de tickets</span>
                </a>
            </li>
            
            <li>     
                <a href="/users" class="flex items-center text-gray-200 hover:text-white py-3 px-4 rounded-lg hover:bg-green-700/60 transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-300 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Gestion des utilisateurs</span>
                </a>
            </li>
        </div>
        
        <div class="mb-8">
            <div class="px-2 mb-3 text-green-300 uppercase text-xs font-semibold tracking-wider">Administration</div>
            <ul class="space-y-2">
                @can('is-admin') 
                <li>
                    <a href="/equipe" class="flex items-center text-gray-200 hover:text-white py-3 px-4 rounded-lg hover:bg-green-700/60 transition-all duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-300 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Gestion des équipes</span>
                    </a>
                </li>
                
                <li>
                    <a href="/stades" class="flex items-center text-gray-200 hover:text-white py-3 px-4 rounded-lg hover:bg-green-700/60 transition-all duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-300 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span>Gestion des stades</span>
                    </a>
                </li>
                @endcan
                
                <li>
                    <a href="/tickets" class="flex items-center text-gray-200 hover:text-white py-3 px-4 rounded-lg hover:bg-green-700/60 transition-all duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-300 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                        <span>Gestion des tickets</span>
                    </a>
                </li>
            </ul>
        </div>
    
    <div class="absolute bottom-0 left-0 w-full p-6">
        <a href="{{ route('profile.index', ['id' => Auth::user()->id]) }}" class="block">
            <div class="flex items-center space-x-3 mb-6 px-4 hover:bg-green-700 rounded-lg transition">
                @if(Auth::check())
                    <div class="flex-shrink-0">
                        @if(Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Photo de profil" class="w-10 h-10 rounded-full border-2 border-green-400">
                        @else
                            <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-white font-bold">
                                {{ substr(Auth::user()->nom, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <div class="text-sm font-medium text-white">{{ Auth::user()->nom }}</div>
                        <div class="text-xs text-green-300">{{ Auth::user()->role }}</div>
                    </div>
                @endif
            </div>
        </a>
        <a href="#" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="flex items-center justify-center w-full text-white py-3 px-4 rounded-lg bg-red-600 hover:bg-red-700 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Déconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</nav>
