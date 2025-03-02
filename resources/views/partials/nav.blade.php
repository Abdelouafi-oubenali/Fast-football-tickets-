<nav class="fixed top-0 left-0 h-full w-64 bg-green-800 p-4">
    <div class="text-white text-xl font-bold mb-8">⚽ Gestion des Tickets</div>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('dashboard.admin') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded hover:bg-green-700">
                Tableau de bord
            </a>
        </li>
        <li>
            <a href="{{ route('admin.vente-de-tickets') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded hover:bg-green-700">
                Vente de tickets
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gestion-des-matchs') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded hover:bg-green-700">
                Gestion des matchs
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gestion-des-equipes') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded hover:bg-green-700">
                Gestion des équipes
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gestion-des-stades') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded hover:bg-green-700">
                Gestion des stades
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gestion-des-tickets') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded hover:bg-green-700">
                Gestion des tickets
            </a>
        </li>
        <li>
            <a href="{{ route('admin.historique') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded hover:bg-green-700">
                Historique
            </a>
        </li>
    </ul>
</nav>
