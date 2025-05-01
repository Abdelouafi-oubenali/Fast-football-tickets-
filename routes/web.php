<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\MatchsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AccountCreatedMailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;



// Page Home
Route::get('/', [HomController::class, 'index'])->name('home');

// AUthitifaction
Route::get('/register', [AuthController::class, 'ShowRegsterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Mot de passe 
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Envoyer email + mot de passe
Route::post('/send-email-password', [AccountCreatedMailController::class, 'sendResetLink'])->name('sendEmailEtPassword.user');

// ==================== Admin Views ====================
Route::get('/test-dashbord', function () {
    return view('client.index');
})->name('welcome');

Route::get('/admin/vente-de-tickets', function () {
    return view('admin.vente-de-tickets');
})->name('admin.vente-de-tickets');

Route::get('/vente-de-tickets', [VenteController::class, 'index'])->name('vente.teckts');

// ==================== Authre Routes ====================
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('dashboard', [DashbordController::class, 'index'])->name('dashboard.admin');


    // CRUD 
    Route::resource('match', MatchsController::class);
    Route::resource('equipe', EquipeController::class);
    Route::resource('stades', StadiumController::class);
    Route::resource('tickets', TicketsController::class);
    Route::resource('users', UserController::class);

    // User Management
    Route::get('/manage-users/{userRequest}', [UserController::class, 'manage_users'])->name('manage.users');
    Route::post('/manage-users/{userRequest}', [UserController::class, 'manage_users']);
    Route::delete('/manage-users/{id}', [UserController::class, 'destroy']);
    Route::post('/users/{id}/ban', [UserController::class, 'ban_user'])->name('users.ban');
    Route::post('/users/{id}/active', [UserController::class, 'activeUser'])->name('users.active');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile.index'); 
    Route::get('/profil/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/historique', [ProfileController::class, 'historique'])->name('profile.historique');

    // Reservation
    Route::get('/reservation/info/{id}', [ReservationController::class, 'index']);
    Route::get('/reservation/panier', [ReservationController::class, 'Panier'])->name('Panier.index'); 
    Route::get('/reservation/{id}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::post('/reservation/create', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/mes-teckts', [ReservationController::class, 'Panier'])->name('reservation.Panier');

    // Paiement
    Route::post('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/payment/success/{ticket_info_id}', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel/{ticket_info_id}', [PaymentController::class, 'cancel'])->name('payment.cancel');
    Route::get('/tickets/download/{ticketInfoId}', [PaymentController::class, 'downloadTicketPdf'])->name('tickets.download');
});

Route::get('/banned', function () {
    return view('auth.banned');
})->name('banned');