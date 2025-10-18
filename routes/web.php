<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Authors\AuthorController;
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


Route::middleware('guest')->group(function () {
    // Login
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/', [LoginController::class, 'login'])->name('login');

    // Inscription
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

// Routes pour les utilisateurs connectés
Route::middleware('auth')->group(function () {
    // Page d'accueil
    Route::get('/home', [LoginController::class, 'index'])->name('home');
    // Déconnexion
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Auteurs
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
//    Route::get('/authors', [AuthorController::class, 'getAuthors'])->name('list.authors');
    Route::get('/books', [\App\Http\Controllers\Books\BookController::class, 'index'])->name('books.home');
});
