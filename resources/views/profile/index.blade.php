@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4 md:p-8 ml-[40rem] w-[80rem]" style="margin-left: 15rem">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600 ml[1rem]" style="margin-left:1rem"></div>
                    <div class="absolute bottom-0 left-8 transform translate-y-1/2">
                    <img class="rounded-full border-4 border-white w-24 h-24 object-cover" src="{{ asset('storage/' . $user->photo) }}" alt="User Profile Picture">
                </div>
            </div>            
            <div class="pt-16 pb-8 px-8">
                <h1 class="text-2xl font-bold text-gray-800">{{ $user->nom}}</h1>
                <p class="text-gray-600"> {{ $user->email}}</p>
                <p class="text-gray-500 mt-2"> <b>Role</b> : {{ $user->role}}</p>
                
                <div class="mt-6 flex flex-wrap gap-2">
                    <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">ID: 12345</span>
                </div>
            </div>
        </div>        
</div>

<!-- Content Area -->
<div class="grid md:grid-cols-3 gap-6 mt-6" style="margin-left: 17rem">
    <!-- Left Sidebar -->
    <div class="md:col-span-1 space-y-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">Intro</h3>
            <div class="space-y-2 text-gray-600">
                <p><i class="fas fa-briefcase mr-2"></i>Web Developer at YouCode</p>
                <p><i class="fas fa-graduation-cap mr-2"></i>Studied at Local University</p>
                <p><i class="fas fa-home mr-2"></i>Lives in Casablanca, Morocco</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">permision</h3>
            <div class="grid grid-cols-2 gap-2">
                 <p>add tecktes </p>
                 <p>gestion des teckts </p>
                 <p>supoirmer les users</p>
                 <p>hello world</p>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">About</h3>
            <p class="text-gray-600">
                {{$user->About}}
            </p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4">Mes Informations</h3>
            <div class="space-y-4">
                <div>
                    <p class="text-gray-600"> <b>Nom</b>: {{$user->nom}}</p>
                    <p class="text-gray-600"><b> Prénom</b>: {{$user->prenom}}</p>
                </div>
                <div>
                    <p class="text-gray-600"> <b> Email </b> : {{$user->email}}</p>
                    <p class="text-gray-600"><b> Téléphone </b> : {{ $user->number_phone}}</p>
                </div>
                <div>
                    <p class="text-gray-600"><b> Adresse </b> : {{$user->adresse}}</p>
                </div>
                <div>
                    <p class="text-gray-600"><b> Role </b>: {{$user->role}}</p>
                </div>
            </div>
            
            <!-- Update Profile Button -->
            <div class="mt-6 text-center">
                <a href="/profil/{{$user->id}}/edit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-200">
                    Update Profile
                </a>
            </div>
        </div>
    </div>
    


@endsection
