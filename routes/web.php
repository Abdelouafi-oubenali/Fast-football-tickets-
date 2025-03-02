<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/gestion-des-matchs', function () {
    return view('admin.gestion-des-matchs');
})->name('admin.gestion-des-matchs');


Route::get('/admin/gestion-des-equipes', function () {
    return view('admin.gestion-des-equipes');
})->name('admin.gestion-des-equipes');

Route::get('/admin/gestion-des-stades', function () {
    return view('admin.gestion-des-stades');
})->name('admin.gestion-des-stades');

Route::get('/admin/gestion-des-tickets', function () {
    return view('admin.gestion-des-tickets');
})->name('admin.gestion-des-tickets');

Route::get('/admin/historique', function () {
    return view('admin.historique');
})->name('admin.historique');
