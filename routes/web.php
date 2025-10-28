<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CamaroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CamaroAdminController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', [CamaroController::class, 'home'])->name('home');
Route::get('/camaro/exhibition', [CamaroController::class, 'camaroExhibition'])->name('camaro.camaroExhibition');

// Authentication
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Camaro CRUD routes
Route::middleware('auth')->group(function(){
    Route::get('/camaro/create', [CamaroController::class, 'create'])->name('camaro.create');
    Route::post('/camaro', [CamaroController::class, 'store'])->name('camaro.store');
    Route::get('/camaro/{camaro}', [CamaroController::class, 'show'])->name('camaro.show');
    Route::get('/camaro/{camaro}/edit', [CamaroController::class, 'edit'])->name('camaro.edit');
    Route::put('/camaro/{camaro}', [CamaroController::class, 'update'])->name('camaro.update');
    Route::delete('/camaro/{camaro}', [CamaroController::class, 'destroy'])->name('camaro.destroy');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

// Admin
Route::middleware(['auth', 'can:isAdmin'])->group(function(){
    Route::get('/admin', [CamaroAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('/admin/user/{user}', [CamaroAdminController::class, 'destroyUser'])->name('admin.user.destroy');
});
