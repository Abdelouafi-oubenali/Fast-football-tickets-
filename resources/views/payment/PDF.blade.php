<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billet - {{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <!-- En-tête du ticket -->
        <div class="bg-green-100 px-6 py-4 border-b border-green-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="h-8 w-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <h1 class="text-2xl font-bold text-green-800">Billet Officiel</h1>
                </div>
                <p class="text-sm text-gray-600">Réf: TIK-{{ str_pad($ticketInfo->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>
        
        <!-- Contenu du ticket -->
        <div class="p-6">
            <!-- Match info -->
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }}</h2>
                <p class="text-gray-600">{{ $match->date }} à {{ $match->time }}</p>
            </div>
            
            <!-- Détails de la réservation -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-3 text-gray-800 border-b pb-2">Détails de votre réservation</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <p class="text-sm text-gray-500">Match</p>
                            <p class="font-medium">{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date et Heure</p>
                            <p class="font-medium">{{ $match->date }} à {{ $match->time }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Stade</p>
                            <p class="font-medium">{{ $match->Stadium }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tribune</p>
                            <p class="font-medium">{{ $ticketInfo->category }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nombre de places</p>
                            <p class="font-medium">{{ $ticketInfo->quantity }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Montant total</p>
                            <p class="font-medium">{{ $ticketInfo->totla_price }} DH</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Code QR (simulé) -->
            <div class="mb-6 flex justify-center">
                <div class="text-center">
                    <p class="text-sm text-gray-500 mb-2">Scannez ce code à l'entrée du stade</p>
                    <div class="bg-gray-200 p-8 inline-block">
                        <!-- Simulation de QR code -->
                        <div class="w-24 h-24 bg-white relative">
                            <div class="absolute inset-0 grid grid-cols-5 grid-rows-5">
                                @for ($i = 0; $i < 25; $i++)
                                    <div class="bg-{{ rand(0, 1) ? 'white' : 'black' }}"></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Notes importantes -->
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            Ce billet est valide uniquement pour la date et l'heure indiquées. Veuillez vous présenter au moins 45 minutes avant le début du match.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="mt-8 pt-4 border-t border-gray-200 text-center text-sm text-gray-500">
                <p>Merci pour votre achat! Pour toute question, contactez notre service client.</p>
                <p class="mt-1">© {{ date('Y') }} - Tous droits réservés</p>
            </div>
        </div>
    </div>
</body>
</html>