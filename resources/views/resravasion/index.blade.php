@extends('layouts.main')

@section('title', 'foot tecketr')

@section('content')

<main class="bg-gray-100 font-sans">
    <!-- Première partie: Informations du match -->
    <section class="bg-green-600 text-white py-8" style="background-image: url('https://t4.ftcdn.net/jpg/02/88/68/21/360_F_288682192_Mi7iUPqCtj8XJ0UDgeRw2IVgRW5rmG2z.jpg'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center mb-6">Match de Football</h1>
            <div class="flex justify-center items-center space-x-8">
                <div class="text-center">
                    <img src="{{asset('storage/' . $match->awayTeam->logo)}}" alt="Logo Équipe 1" class="mx-auto mb-2 rounded-full bg-white p-2 w-28">
                    <h2 class="text-xl font-bold">{{$match->awayTeam->name}}</h2>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold px-6 py-3 rounded-lg">
                        VS
                    </div>
                    <p class="mt-2">{{$match->time}}</p>
                    <p>{{ $match->date}}</p>
                    {{-- <p>15 Avril 2025</p> --}}

                </div>
                <div class="text-center">
                    <img src="{{asset('storage/' . $match->homeTeam->logo)}}" alt="Logo Équipe 2" class="mx-auto mb-2 rounded-full bg-white p-2 w-[100px]">
                    <h2 class="text-xl font-bold">{{$match->homeTeam->name}}</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Deuxième partie divisée en 2: Terrain et Détails -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('storage/' .$stade_image )}}" alt="Terrain de football" class="w-[50rem] h-[20rem] object-cover">
                 
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 shadow-lg">
                    <h3 class="text-xl font-bold mb-4 text-green-900 border-b pb-2">Détails du Match</h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between">
                            <span class="font-medium">Compétition:</span>
                            <span>Ligue 1</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Stade:</span>
                            <span>{{$match->Stadium}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Date:</span>
                            <span>{{$match->date}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Heure:</span>
                            <span>{{$match->time}}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Journée:</span>
                            <span>34ème journée</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="font-medium">Arbitre principal:</span>
                            <span>François Dupont</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 bg-gray-100">
        <div class="container mx-auto px-4">
          <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
            <h3 class="text-xl font-bold mb-6 text-green-900 border-b pb-2">Réservation de places</h3>
            
            <!-- Plan du stade -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <!-- Visualisation stade -->
              <div class="md:col-span-2 bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Plan du stade</h2>
                <div class="border-2 border-gray-300 p-4 rounded-lg h-96 relative">
                  <div class="absolute top-0 left-1/4 right-1/4 h-16 bg-green-100 border border-green-300 rounded flex items-center justify-center cursor-pointer hover:bg-green-200" onclick="selectTribune('nord')">
                    Tribune Nord
                  </div>
                  
                  <div class="absolute bottom-0 left-1/4 right-1/4 h-16 bg-green-100 border border-green-300 rounded flex items-center justify-center cursor-pointer hover:bg-green-200" onclick="selectTribune('sud')">
                    Tribune Sud
                  </div>
                  
                  <div class="absolute top-1/4 bottom-1/4 right-0 w-16 bg-yellow-100 border border-yellow-300 rounded flex items-center justify-center cursor-pointer hover:bg-yellow-200 writing-mode-vertical" onclick="selectTribune('est')">
                    Tribune Est
                  </div>
                  
                  <div class="absolute top-1/4 bottom-1/4 left-0 w-16 bg-purple-100 border border-purple-300 rounded flex items-center justify-center cursor-pointer hover:bg-purple-200 writing-mode-vertical" onclick="selectTribune('ouest')">
                    Tribune Ouest
                  </div>
                  
                  <div class="absolute top-1/4 left-1/4 right-1/4 bottom-1/4 bg-green-500 rounded-lg flex items-center justify-center text-white">
                    Terrain
                  </div>
                </div>
                
                <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-3">
                    @foreach ($categories as $category)
                        <div class="flex items-center gap-2 p-2 rounded-lg border border-green-200 bg-green-50">
                            <div class="w-3 h-3 bg-green-100 border border-green-300 rounded-sm"></div>
                            <span class="text-sm">{{ $category->nom }}</span>
                            <span class="ml-auto text-xs bg-green-100 text-green-800 px-2 py-0.5 rounded">{{ $category->nombre_place }} places</span>
                        </div>
                    @endforeach
                </div>
                
              </div>
           {{-- Tarifs --}}
              <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <h4 class="font-bold mb-2">Tarifs:</h4>
                <div class="grid grid-cols-1 gap-10">
                    @foreach ($categories as $category)
                        <div class="flex justify-between p-1 border-b border-gray-200">
                            <p>{{ $category->nom }}</p>
                            <p class="font-medium">{{ $category->prix }} €</p>
                        </div>
                    @endforeach
                </div>
            </div>
            
            </div>
            
            <div class="mt-8 grid grid-cols-1 md:grid-cols-1 gap-6">
              
              <!-- Tarifs -->
              <div class="bg-green-600 p-8 md:p-12 lg:px-16 lg:py-24 flex justify-center items-center rounded-xl">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="text-2xl font-bold text-white font-unbounded md:text-3xl">
                        Veuillez respecter la place indiquée sur votre billet et suivre les consignes de sécurité. Merci de votre compréhension et bon match !
                    </h2>
                
                    <div class="mt-4 md:mt-8">
                        <a href="/reservation/{{$match->id}}" class="inline-block rounded-sm border border-white bg-white px-12 py-3 text-sm font-medium text-green-500 transition hover:bg-transparent hover:text-white focus:ring-3 focus:ring-yellow-400 focus:outline-hidden">
                            Réservez votre place
                        </a>
                    </div>
                </div>
                
            </div>
            </div>
          </div>
        </div>
      </section>

</main>

<script>
function selectTribune(tribune) {

    document.querySelectorAll('.hover\\:bg-green-200, .hover\\:bg-green-200, .hover\\:bg-yellow-200, .hover\\:bg-purple-200').forEach(el => {
        el.classList.remove('ring-2', 'ring-offset-2', 'ring-green-500');
    });
    
    const elements = {
        'nord': document.querySelector('.hover\\:bg-green-200'),
        'sud': document.querySelector('.hover\\:bg-green-200'),
        'est': document.querySelector('.hover\\:bg-yellow-200'),
        'ouest': document.querySelector('.hover\\:bg-purple-200')
    };
    
    if (elements[tribune]) {
        elements[tribune].classList.add('ring-2', 'ring-offset-2', 'ring-green-500');
    }
    const tribuneNames = {
        'nord': 'Tribune Nord',
        'sud': 'Tribune Sud',
        'est': 'Tribune Est',
        'ouest': 'Tribune Ouest'
    };
    
    const prices = {
        'nord': 45,
        'sud': 40,
        'est': 55,
        'ouest': 60
    };
    
    document.getElementById('selectedTribune').textContent = tribuneNames[tribune];
    document.getElementById('selectedCategory').textContent = 'Standard';
    document.getElementById('selectedQuantity').textContent = '1';
    document.getElementById('totalPrice').textContent = prices[tribune] + ' €';
}
</script>

@endsection