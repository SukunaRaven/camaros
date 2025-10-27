<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CamaroController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', [CamaroController::class, 'home'])->name('home');
Route::get('/camaro/exhibition', [CamaroController::class, 'camaroExhibition'])->name('camaro.camaroExhibition');

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Camaro CRUD routes (auth required)
Route::middleware('auth')->group(function(){
    Route::get('/camaro/create', [CamaroController::class, 'create'])->name('camaro.create');
    Route::post('/camaro', [CamaroController::class, 'store'])->name('camaro.store');
    Route::get('/camaro/{camaro}', [CamaroController::class, 'show'])->name('camaro.show');
    Route::get('/camaro/{camaro}/edit', [CamaroController::class, 'edit'])->name('camaro.edit');
    Route::put('/camaro/{camaro}', [CamaroController::class, 'update'])->name('camaro.update');
    Route::delete('/camaro/{camaro}', [CamaroController::class, 'destroy'])->name('camaro.destroy');
});

// Dashboard
Route::middleware('auth')->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');
