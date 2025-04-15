<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserBookController;

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

Route::get('/library/{id}', [BookController::class, 'show'])->name('library.show');
Route::post('/library/{id}/note', [BookController::class, 'addNote'])->name('library.addNote');


Route::get('/', function () {
    return view('home');
});

Route::get('/my-books', [UserBookController::class, 'index'])->name('userbooks.index');
Route::get('/my-books/write', [UserBookController::class, 'create'])->name('userbooks.create');
Route::post('/my-books/store', [UserBookController::class, 'store'])->name('userbooks.store');
Route::get('/my-books/{id}', [UserBookController::class, 'show'])->name('userbooks.show');
Route::get('/my-books/{id}/download', [UserBookController::class, 'download'])->name('userbooks.download');

