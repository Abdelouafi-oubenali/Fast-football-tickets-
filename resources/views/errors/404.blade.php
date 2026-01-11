{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page non trouvée</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="text-center px-6 py-8 bg-white rounded-xl shadow-md">
        <h1 class="text-9xl font-extrabold text-red-500 mb-4">404</h1>
        <h2 class="text-2xl font-semibold mb-2">Oups ! Page introuvable</h2>
        <p class="text-gray-600 mb-6">
            La page que vous recherchez n'existe pas ou a été déplacée.
        </p>
        <a href="{{ route('home') }}" 
           class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            Retour à l'accueil
        </a>
    </div>

</body>
</html>
