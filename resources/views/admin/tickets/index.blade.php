@extends('layouts.master')

@section('title','Gestion des tickets')

@section('content')
  <main class="ml-64 pt-20 p-8">
    <!-- Filtres -->
    <div class="container mx-auto px-4 py-6 flex">
        
        <div class="bg-white rounded-lg shadow p-4 flex flex-wrap gap-[45rem]">
        <a href="/tickets/create/" class="bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-lg shadow-lg transition-colors duration-200 flex items-center gap-2 w-full md:w-auto justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ajouter un Match
        </a>

        <a href="/matchs/historique/{{1}}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-lg shadow-lg transition-colors duration-200 flex items-center gap-2 w-full md:w-auto justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
              </svg>
              
          Historique
        </a>
        </div>
    
    </div>

    <!-- Liste des matchs -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Match 1 -->
            @forEach($matches as $match)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-blue-50 p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-blue-800 font-semibold">Ligue 1</span>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Places disponibles</span>
                    </div>
                    <div class="text-center space-y-2">
                        <p class="text-gray-500">{{$match->date}} {{$match->time}}</p>
                        <div class="flex justify-center items-center gap-4">
                            <div class="text-center">
                                <p class="font-bold text-xl">{{$match->homeTeam->name}}</p>
                                <img src="{{asset('storage/' . $match->homeTeam->logo)}}" alt="PSG" class="mx-auto w-[4rem]"/>
                            </div>
                            <div class="text-2xl font-bold">VS</div>
                            <div class="text-center">
                                <p class="font-bold text-xl"> {{$match->awayTeam->name}}    </p>
                                <img src="{{asset('storage/' . $match->awayTeam->logo)}}" alt="OM" class="mx-auto w-[5rem]"/>
                            </div>
                        </div>
                        <p class="font-medium">Parc des Princes</p>
                    </div>
                </div>
                <div class="p-4 space-y-4">
                     @foreach($match->categories as $category) 
                <div class="flex justify-between items-center">
                    <span class="font-medium">{{ $category->nom }}</span> 
                    <div class="text-right">
                        <p class="font-bold text-lg">{{ $category->prix }} DH</p> 
                        <p class="text-sm {{ $category->nombre_place > 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $category->nombre_place > 0 ? $category->nombre_place . ' places restantes' : 'Complet' }}
                        </p>
                    </div>
                </div>
            @endforeach
                    <div class="flex space-x-2">
                    <a href="/tickets/{{ $match->id }}/edit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 text-center block flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{route('tickets.destroy',$match->id)}}" method="POST">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" href="#" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 text-center block flex items-center justify-center w-[5rem]" style="width: 5rem">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                   
                    <a href="#" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 text-center block flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                </div>

                </div>
            </div>
          @endforeach
          
        </div>
    </div>
  </main>
  @endsection
