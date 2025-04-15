<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBookController;

// Public Routes
Route::get('/', fn() => view('home'));

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', fn() => view('dashboard'));

    // My Library (MongoDB Books)
    Route::get('/my-library', [BookController::class, 'index'])->name('library.index');
    Route::get('/my-library/create', [BookController::class, 'create'])->name('library.create');
    Route::post('/my-library', [BookController::class, 'store'])->name('library.store');
    Route::get('/my-library/{book}/edit', [BookController::class, 'edit'])->name('library.edit');
    Route::put('/my-library/{book}', [BookController::class, 'update'])->name('library.update');
    Route::delete('/my-library/{book}', [BookController::class, 'destroy'])->name('library.destroy');

    // Notes (still allow post to notes for public books)
    Route::post('/library/{id}/note', [BookController::class, 'addNote'])->name('library.addNote');

    // User Books (Authoring + Edit/Delete)
    Route::resource('userbooks', UserBookController::class)->except(['show']); // handled below

    // Optional: redirect from /my-books to /userbooks
    Route::get('/my-books', fn() => redirect()->route('userbooks.index'));
});

// User Book Detail + PDF (publicly viewable)
Route::get('/my-books/{id}', [UserBookController::class, 'show'])->name('userbooks.show');
Route::get('/my-books/{id}/download', [UserBookController::class, 'download'])->name('userbooks.download');
Route::get('/my-library/{id}', [BookController::class, 'show'])->name('library.show');
