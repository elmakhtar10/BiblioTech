<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Authors\AuthorController;
use App\Http\Controllers\History\HistoryPerSubscriberController;
use App\Http\Controllers\ProfileController;
use App\Livewire\History\HistoryPerSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return redirect('/reservation');
});

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/', [LoginController::class, 'login'])->name('login');

    // Inscription
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

// Routes pour les utilisateurs connectés
Route::middleware(['auth', 'check.status', 'is_admin'])->group(function () {
    // Page d'accueil
    Route::get('/reservation', [LoginController::class, 'index'])->name('reservation');
    // Déconnexion
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Auteurs
    Route::get('/auteurs', [AuthorController::class, 'index'])->name('authors');
//    Route::get('/authors', [AuthorController::class, 'getAuthors'])->name('list.authors');
    Route::get('/livres', [\App\Http\Controllers\Books\BookController::class, 'index'])->name('books.home');
    Route::get('/reservation/livre', [\App\Http\Controllers\Reservation\ReservationController::class, 'index'])->name('make.reservation');
    Route::get('/abonnes', [\App\Http\Controllers\Subscribers\SubscribersController::class, 'index'])->name('subscribers');
    Route::get('/historiques', [\App\Http\Controllers\History\HistoryController::class, 'index'])->name('historiques');
    Route::get('/reservation/statistiques', [\App\Http\Controllers\Reservation\StatistiquesController::class, 'index'])->name('statistiques');

    Route::get('/historique/{id}', [HistoryPerSubscriberController::class, 'show'])->name('historique.show');
    Route::get('/profile/picture', [ProfileController::class, 'edit'])->name('profile.picture');

});

Route::middleware(['auth', 'check.status'])->group(function () {
    // Page d'accueil
    Route::get('/reservation', [LoginController::class, 'index'])->name('reservation');
    // Déconnexion
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/reservation/livre', [\App\Http\Controllers\Reservation\ReservationController::class, 'index'])->name('make.reservation');
    Route::get('/historique/{id}', [HistoryPerSubscriberController::class, 'show'])->name('historique.show');
    Route::get('/profile/picture', [ProfileController::class, 'edit'])->name('profile.picture');

});

Route::get('/suspended', function () {
    Auth::logout();
    return view('auth.suspended');
})->name('suspended');


