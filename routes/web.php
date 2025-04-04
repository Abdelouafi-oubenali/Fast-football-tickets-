<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\MatchsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\AccountCreatedMailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return view('welcome');
});


// les route de admin  
Route::get('/test-dashbord', function () {
    return view('client.index');
})->name('welcome');


Route::get('/admin/vente-de-tickets', function () {
    return view('admin.vente-de-tickets');
})->name('admin.vente-de-tickets');




// les route de match
Route::middleware('auth')->group(function () {
    Route::resource('match', MatchsController::class);
    Route::resource('equipe', EquipeController::class);
    Route::resource('stades', StadiumController::class);
    Route::resource('tickets', TicketsController::class);
    Route::resource('users', UserController::class);
    Route::post('/manage-users/{userRequest}', [UserController::class, 'manage_users'])->name('manage.users');
    Route::post('/users/{id}/ban', [UserController::class, 'ban_user'])->name('users.ban');
    Route::post('/users/{id}/active', [UserController::class, 'activeUser'])->name('users.active');
    Route::delete('/manage-users/{id}', [UserController::class, 'destroy'])->name('manage.users');
    Route::get('/manage-users/{userRequest}', [UserController::class, 'manage_users'])->name('manage.users');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('dashboard', DashbordController::class)->names([
        'index' => 'dashboard.admin'
    ]);
});

Route::get('/register', [AuthController::class, 'ShowRegsterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::post('/send-email-password', [AccountCreatedMailController::class, 'sendResetLink'])->name('sendEmailEtPassword.user');
// Route::post('/send-email-password', [ForgotPasswordController::class, 'sendEmailEtPassword']);

// route::resource('profil',ProfileController::class);
Route::get('/profil/{id}', [ProfileController::class, 'index'])->name('profile.index'); 
Route::get('/profil/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');


// les route pour forget password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// frontand parti

Route::resource('/home', HomController::class);

Route::resource('reservation', ReservationController::class);
Route::get('/resravasion/panier', [ReservationController::class, 'Panier'])->name('Panier.index'); 
