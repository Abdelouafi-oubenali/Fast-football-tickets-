@extends('layouts.main')

@section('title', 'Panier - Achat de Billets')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Votre Panier</h1>

    <div class="flex flex-wrap -mx-4">
        <div class="w-full lg:w-2/3 px-4 mb-6 lg:mb-0">
            <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                <div class="flex justify-between items-center bg-gray-50 px-6 py-4 border-b">
                    <span class="font-medium">Vos Billets</span>
                    <span class="text-gray-600">{{$quantity}} articles</span>
                </div>
                <div class="p-6">
                    <div class="relative mb-6">
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden relative before:content-[''] before:absolute before:top-0 before:left-0 before:h-full before:w-1 before:bg-gray-200">
                            <div class="bg-gray-50 px-6 py-4 border-b border-dashed">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                    <div>
                                        <h5 class="font-medium">Match: {{$match->awayTeam->name}} vs {{$match->homeTeam->name}}</h5>
                                        <p class="text-gray-500 text-sm">Stade {{$match->Stadium}}</p>
                                    </div>
                                    <div class="mt-2 sm:mt-0">
                                        <span class="bg-blue-600 text-white px-3 py-1 rounded text-sm">{{$price}} DH</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4 bg-white">
                                <div class="flex flex-wrap -mx-3">
                                    <div class="w-full md:w-1/2 px-3">
                                        <p class="mb-2"><span class="font-semibold">Date:</span> {{$match->date}}</p>
                                        <p class="mb-2"><span class="font-semibold">Heure:</span> {{$match->time}}</p>
                                        <p><span class="font-semibold">Type de place:</span> 
                                            <span class="bg-red-600 text-white px-2 py-0.5 rounded text-xs">{{$category}}</span>
                                        </p>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 mt-4 md:mt-0">
                                        <p class="mb-2"><span class="font-semibold">Quantité:</span> {{$quantity}}</p>
                                        <p class="mb-2"><span class="font-semibold">Prix unitaire:</span> {{$price}} DH</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/3 px-4">
            <form action="{{ route('payment.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="ticket_info_id" value="{{ $enrollment->id }}">
                <input type="hidden" name="amount" value="{{ $total_price }}">
                
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h5 class="font-medium">Résumé de la commande</h5>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between mb-3">
                            <span class="text-gray-600">Prix des tickets</span>
                            <span>{{$price}} DH</span>
                        </div>
                        <div class="flex justify-between mb-3">
                            <span class="text-gray-600">Quantité</span>
                            <span>{{$quantity}}</span>
                        </div>
                        <div class="border-t border-gray-200 my-4"></div>
                        <div class="flex justify-between mb-6">
                            <span class="font-semibold">Total</span>
                            <span class="font-semibold">{{$total_price}} DH</span>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white py-3 px-4 rounded font-medium hover:bg-green-700 transition">
                            Payer avec Stripe
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection