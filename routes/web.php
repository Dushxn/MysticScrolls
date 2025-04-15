<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/my-library', [BookController::class, 'index'])->name('library.index');
    Route::get('/my-library/create', [BookController::class, 'create'])->name('library.create');
    Route::post('/my-library', [BookController::class, 'store'])->name('library.store');
    Route::get('/my-library/{book}/edit', [BookController::class, 'edit'])->name('library.edit');
    Route::put('/my-library/{book}', [BookController::class, 'update'])->name('library.update');
    Route::delete('/my-library/{book}', [BookController::class, 'destroy'])->name('library.destroy');
});

