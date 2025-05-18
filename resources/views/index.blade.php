@extends('layouts.main')

@section('title', 'foot tecketr')

@section('content')

	<main class="w-11/12 mx-auto pt-4 pb-12 flex flex-col gap-10">

		@if(request('search'))
		<section>
			<div class="mb-6">
			  <h2 class="text-gray-800 font-bold font-unbounded text-3xl">Résultats de recherche</h2>
			</div>
			<div class="overflow-x-auto scrollbar-hide"> 
			  <ul class="flex gap-4 pb-4 snap-x snap-mandatory"> 
				@foreach($allMatchesSearch as $match)
				<li class="flex-shrink-0 snap-start" style="width: 300px;"> 
				  <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg h-full">
					<div class="h-44 w-full bg-cover bg-center flex justify-center items-center" style="background-image: url('https://images.unsplash.com/photo-1551958219-acbc608c6377?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3'); background-color: rgba(0,0,0,0.6); background-blend-mode: overlay;">
					  <div class="flex items-center justify-center gap-4">
						<div class="flex flex-col items-center bg-white p-2 rounded-lg">
						  <img src="{{asset('storage/' .$match->homeTeam->logo)}}" alt="Logo Wydad AC" class="w-16 h-16 object-contain"/>
						  <span class="text-sm font-semibold mt-1">{{$match->homeTeam->name}}</span>
						</div>
						
						<div class="flex items-center">
						  <span class="text-2xl font-bold text-white">VS</span>
						</div>
						
						<div class="flex flex-col items-center bg-white p-2 rounded-lg">
						  <img src="{{asset('storage/' .$match->awayTeam->logo)}}"  alt="Logo Raja CA" class="w-16 h-16 object-contain"/>
						  <span class="text-sm font-semibold mt-1">{{$match->awayTeam->name}}</span>
						</div>
					  </div>
					</div>
					
					<div class="bg-white p-4 sm:p-6 flex flex-col gap-2">
					  <time datetime="2023-10-20" class="block text-xs text-gray-500">
						{{\Carbon\Carbon::parse($match->date)->toFormattedDateString()}} 					  </time>
					  
					  <a href="reservation/info/{{$match->id}}">
                        <h3 class="text-lg text-gray-900">{{$match->homeTeam->name}} vs {{$match->awayTeam->name}}</h3>
                      </a>
			
					  <p class="line-clamp-3 text-sm/relaxed text-gray-500">Stade  {{$match->Stadium}}</p>
					  
					  <div class="flex items-center gap-2">
						<span class="text-green-500 font-medium">
						  <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="size-4">
							<path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd"/>
						  </svg>
						</span>
						
						<span class="text-green-500 font-medium">
						  100 DH
						</span>
					  </div>
					  
					  <div class="text-green-600 text-sm font-medium">Derniers billets disponibles</div>
					</div>
				  </article>
				</li>
				@endforeach
			  </ul>
			</div>
		  </section>
		  
		</section>
		</section>
	@endif
		<section class="bg-gray-900 rounded-3xl">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-24 lg:px-12">
              <a href="/tickets" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm bg-gray-800 text-white hover:bg-gray-700 rounded-full" role="alert">
                <span class="text-xs bg-green-600 rounded-full text-white px-4 py-1.5 mr-3">Tickets</span>
                <span class="text-sm font-medium">Découvrez tous les événements</span>
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
              </a>
              <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-[#4df037] md:text-5xl lg:text-6xl/17 font-unbounded">
                Réservation de Tickets Simplifiée, Expérience Garantie !
              </h1>
              <p class="mb-8 text-lg font-normal text-gray-400 lg:text-xl sm:px-16 xl:px-48">
                Réservez votre ticket pour un match & Faites la différence !             
             </p>
              <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <span class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white">
                  Voir les billets disponibles
                  <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                </span>
                <a href="/connexion" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white border-gray-700 hover:bg-gray-700 focus:ring-gray-800 border rounded-full">
                  Créer un compte
                </a>
              </div>
            </div>
          </section>

		<section>
			<div class="mb-6">
				<h2 class="text-gray-800 font-bold font-unbounded text-3xl">Nos services de billetterie</h2>
			</div>
			<ul class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
				<li class="w-full flex flex-col items-center gap-1.5">
					<a href="" class="group w-full h-[100px] flex items-center justify-center bg-gray-900 rounded-xl">
						<span class="group-hover:text-[#f05537] uppercase font-medium text-white text-xl">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
								<path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
								<path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
							</svg>
						</span>
					</a>
					<span class="text-lg font-medium text-gray-800 text-center">Billets garantis</span>
				</li>
				<li class="w-full flex flex-col items-center gap-1.5">
					<a href="" class="group w-full h-[100px] flex items-center justify-center bg-gray-900 rounded-xl">
						<span class="group-hover:text-[#f05537] uppercase font-medium text-white text-xl">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
								<path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
							</svg>
						</span>
					</a>
					<span class="text-lg font-medium text-gray-800 text-center">Prix officiel</span>
				</li>
				<li class="w-full flex flex-col items-center gap-1.5">
					<a href="" class="group w-full h-[100px] flex items-center justify-center bg-gray-900 rounded-xl">
						<span class="group-hover:text-[#f05537] uppercase font-medium text-white text-xl">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
								<path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
							</svg>
						</span>
					</a>
					<span class="text-lg font-medium text-gray-800 text-center">Livraison rapide</span>
				</li>
				<li class="w-full flex flex-col items-center gap-1.5">
					<a href="" class="group w-full h-[100px] flex items-center justify-center bg-gray-900 rounded-xl">
						<span class="group-hover:text-[#f05537] uppercase font-medium text-white text-xl">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
								<path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 00-1.032-.211 50.89 50.89 0 00-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 002.433 3.984L7.28 21.53A.75.75 0 016 21v-4.03a48.527 48.527 0 01-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979z" />
								<path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 001.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0015.75 7.5z" />
							</svg>
						</span>
					</a>
					<span class="text-lg font-medium text-gray-800 text-center">Support 24/7</span>
				</li>
				<li class="w-full flex flex-col items-center gap-1.5">
					<a href="" class="group w-full h-[100px] flex items-center justify-center bg-gray-900 rounded-xl">
						<span class="group-hover:text-[#f05537] uppercase font-medium text-white text-xl">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
								<path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
							</svg>
						</span>
					</a>
					<span class="text-lg font-medium text-gray-800 text-center">Places sécurisées</span>
				</li>
				<li class="w-full flex flex-col items-center gap-1.5">
					<a href="" class="group w-full h-[100px] flex items-center justify-center bg-gray-900 rounded-xl">
						<span class="group-hover:text-[#f05537] uppercase font-medium text-white text-xl">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
								<path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM6.262 6.072a8.25 8.25 0 1010.562-.766l-4.389 8.35a.75.75 0 01-1.37-.012L6.262 6.072z" clip-rule="evenodd" />
								<path d="M12.75 7.5a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V7.5z" />
							</svg>
						</span>
					</a>
					<span class="text-lg font-medium text-gray-800 text-center">Nationalité Maroc</span>
				</li>
			</ul>
		
		</section>
        <section>
            <div class="mb-6">
              <h2 class="text-gray-800 font-bold font-unbounded text-3xl">Matchs en vedette</h2>
            </div>
            <div class="">
              <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 grid-rows-1">


            @foreach($matches as $match)
                <li>
                  <article class="h-full overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
                    <div class="h-44 w-full bg-cover bg-center flex justify-center items-center" style="background-image: url('https://images.unsplash.com/photo-1522778526097-ce0a22ceb253?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3'); background-color: rgba(0,0,0,0.6); background-blend-mode: overlay;">
                      <div class="flex items-center justify-center gap-4">
                        <div class="flex flex-col items-center bg-white p-2 rounded-lg">
                          <img src="{{asset('storage/' .$match->homeTeam->logo)}}" alt="Logo AS FAR" class="w-16 h-16 object-contain"/>
                          <span class="text-sm font-semibold mt-1">{{$match->homeTeam->name}}</span>
                        </div>
                        <div class="flex items-center">
                          <span class="text-2xl font-bold text-white">VS</span>
                        </div>
                        <div class="flex flex-col items-center bg-white p-2 rounded-lg">
                          <img src="{{asset('storage/' .$match->awayTeam->logo)}}" alt="Logo Renaissance Berkane" class="w-16 h-16 object-contain"/>
                          <span class="text-sm font-semibold mt-1">{{$match->awayTeam->name}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="bg-white p-4 sm:p-6 flex flex-col gap-2">
                      <time datetime="2022-10-10" class="block text-xs text-gray-500">
                         {{\Carbon\Carbon::parse($match->date)->toFormattedDateString()}} - {{\Carbon\Carbon::parse($match->time)->format('H:i')}}
                      </time>
                      <a href="reservation/info/{{$match->id}}">
                        <h3 class="text-lg text-gray-900">{{$match->homeTeam->name}} vs {{$match->awayTeam->name}}</h3>
                      </a>
          
                      <p class="line-clamp-3 text-sm/relaxed text-gray-500">Complexe Sportif Prince {{$match->Stadium}}</p>
          
                      <div class="flex items-center gap-2">
                        <span class="text-green-500 font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd"/>
                          </svg>
                        </span>
          
                        <span class="text-green-500 font-medium">
                           120 DH
                        </span>
                      </div>
          
                      <div class="text-green-600 text-sm font-medium">Places limitées</div>
                    </div>
                  </article>
                </li>
            @endforeach
              </ul>
            </div>
          </section>
			<div class="mx-auto max-w-screen-2xl">
				<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
					<div class="bg-green-600 p-8 md:p-12 lg:px-16 lg:py-24 flex justify-center items-center rounded-xl">
						<div class="mx-auto max-w-xl text-center">
							<h2 class="text-2xl font-bold text-white font-unbounded md:text-3xl">
								Réservez votre place maintenant et vivez chaque match comme si vous étiez sur le terrain !
							</h2>

							<p class="hidden text-white/90 sm:mt-4 sm:block">Réservez votre ticket en ligne et assurez votre place pour le prochain grand match. Vivez l’émotion du football en direct et sans tracas 
						</div>
					</div>

					<div class="grid grid-cols-2 gap-4 md:grid-cols-1 lg:grid-cols-2">
						<img alt="" class="rounded-xl h-full object-cover w-full" src="https://news33.ma/wp-content/uploads/2023/01/EAEE8FCB-D44E-4DCE-A1F1-015609907C6B-450x300.jpeg" class="h-44 w-full object-cover object-center  sm:h-44 md:h-full"/>
						<img alt="" class="rounded-xl h-full object-cover w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT78Ez4j36OM8SUKIi18gz_4LwTFhYiOU3qVA&s" class="h-44 w-full object-cover sm:h-44 md:h-full"/>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="mb-6">
			  <h2 class="text-gray-800 font-bold font-unbounded text-3xl">Moure Matchs</h2>
			</div>
			<div class="overflow-x-auto scrollbar-hide"> 
			  <ul class="flex gap-4 pb-4 snap-x snap-mandatory"> 
				@foreach($allMatches as $match)
				<li class="flex-shrink-0 snap-start" style="width: 300px;"> 
				  <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg h-full">
					<div class="h-44 w-full bg-cover bg-center flex justify-center items-center" style="background-image: url('https://images.unsplash.com/photo-1551958219-acbc608c6377?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3'); background-color: rgba(0,0,0,0.6); background-blend-mode: overlay;">
					  <div class="flex items-center justify-center gap-4">
						<div class="flex flex-col items-center bg-white p-2 rounded-lg">
						  <img src="{{asset('storage/' .$match->homeTeam->logo)}}" alt="Logo Wydad AC" class="w-16 h-16 object-contain"/>
						  <span class="text-sm font-semibold mt-1">{{$match->homeTeam->name}}</span>
						</div>
						
						<div class="flex items-center">
						  <span class="text-2xl font-bold text-white">VS</span>
						</div>
						
						<div class="flex flex-col items-center bg-white p-2 rounded-lg">
						  <img src="{{asset('storage/' .$match->awayTeam->logo)}}"  alt="Logo Raja CA" class="w-16 h-16 object-contain"/>
						  <span class="text-sm font-semibold mt-1">{{$match->awayTeam->name}}</span>
						</div>
					  </div>
					</div>
					
					<div class="bg-white p-4 sm:p-6 flex flex-col gap-2">
					  <time datetime="2023-10-20" class="block text-xs text-gray-500">
						{{\Carbon\Carbon::parse($match->date)->toFormattedDateString()}} - {{\Carbon\Carbon::parse($match->time)->format('H:i')}}
					  </time>
					  
					  <a href="reservation/info/{{$match->id}}">
                        <h3 class="text-lg text-gray-900">{{$match->homeTeam->name}} vs {{$match->awayTeam->name}}</h3>
                      </a>
			
					  <p class="line-clamp-3 text-sm/relaxed text-gray-500">Stade  {{$match->Stadium}}</p>
					  
					  <div class="flex items-center gap-2">
						{{-- <span class="text-green-500 font-medium">
						  <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="size-4">
							<path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd"/>
						  </svg>
						</span> --}}
						
						{{-- <span class="text-green-500 font-medium">
						  100 DH
						</span> --}}
					  </div>
					  
					  <div class="text-green-600 text-sm font-medium">Derniers billets disponibles</div>
					</div>
				  </article>
				</li>
				@endforeach
			  </ul>
			</div>
		  </section>
		  
		
			<div class="mb-6">
				<h2 class="text-gray-800 font-bold font-unbounded text-3xl">Top stads</h2>
			</div>
			<div class="">
				<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
					@foreach($TopStads as $stad)
					<li class="group relative bg-gray-300 w-full h-[350px] rounded-3xl shadow-lg overflow-hidden">
						<a href="">
							<div class="absolute top-0 left-0 w-full h-full">
								<img class="group-hover:transform-gpu group-hover:scale-100 scale-107 transition-all object-cover w-[full] h-full brightness-50" src="{{asset('storage/' . $stad->photo)}}" alt="">
							</div>
							<div class="absolute bottom-6 left-6 flex gap-2 items-center">
								<span class="text-2xl font-bold text-white">{{$stad->name}}</span>
								<span class="text-2xl font-bold text-white">
									<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="size-6">
										<path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z"/>
									</svg>
								</span>
							</div>
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</section>
	</main>

	{{-- footer --}}

@endsection


