<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\MatchsController;
use App\Http\Controllers\StadesController;
use App\Http\Controllers\TicketsController;



Route::get('/', function () {
    return view('welcome');
});


// les route de admin  

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard/admin', function () {
    return view('admin.dashboard');
})->name('dashboard.admin'); 


Route::get('/admin/vente-de-tickets', function () {
    return view('admin.vente-de-tickets');
})->name('admin.vente-de-tickets');

Route::get('/admin/matchs/gestion-des-matchs', function () {
    return view('admin.matchs.gestion-des-matchs');
})->name('admin.gestion-des-matchs');


Route::get('/admin/equipe/gestion-des-equipes', function () {
    return view('admin.equipe.gestion-des-equipes');
})->name('admin.gestion-des-equipes');

Route::get('/admin/stades/gestion-des-stades', function () {
    return view('admin.stades.gestion-des-stades');
})->name('admin.gestion-des-stades');

Route::get('/admin/tickets/gestion-des-tickets', function () {
    return view('admin.tickets.gestion-des-tickets');
})->name('admin.gestion-des-tickets');

Route::get('/admin/historique', function () {
    return view('admin.historique');
})->name('admin.historique');


// Route::get('/login', function () {
//     return view('auth.login');
// });
// Route::get('/register', function () {
//     return view('auth.register');
// });

// les route de match
Route::resource('match', MatchsController::class);
Route::resource('equipe', EquipeController::class);
Route::resource('stades', StadesController::class);
Route::resource('tickets', TicketsController::class);

Route::get('/register', [AuthController::class, 'ShowRegsterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

