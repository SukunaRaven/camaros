<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])
    ->name('camaros.home');
Route::get('/show', [HomeController::class, 'show'])
    ->name('camaros.show');
Route::get('/admin', [HomeController::class, 'admin'])
    ->name('admin.admin');
Route::get('/create', [HomeController::class, 'create'])
    ->name('camaros.create');
Route::get('/edit', [HomeController::class, 'edit'])
    ->name('camaros.edit');
Route::get('/userProfile', [HomeController::class, 'userProfile'])
    ->name('users.userProfile');
Route::get('/registerUser', [HomeController::class, 'registerUser'])
    ->name('users.registerUser');
Route::get('/loginUser', [HomeController::class, 'loginUser'])
    ->name('users.loginUser');



Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::resource('admin/camaros', AdminCamaroController::class);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
