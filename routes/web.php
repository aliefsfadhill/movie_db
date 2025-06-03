<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman utama (homepage) tanpa proteksi
Route::get('/', [MovieController::class, 'index']);

// Route untuk login (form dan proses)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Group route yang butuh autentikasi (login)
Route::middleware('auth')->group(function () {
    Route::get('/movie/create', [MovieController::class, 'create']);
    Route::post('/movie/store', [MovieController::class, 'store'])->name('movie.store');

    // Route untuk menampilkan data movie
    Route::get('/movie/list', [MovieController::class, 'list'])->name('movie.list');

Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movie.update');
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movie.destroy');

// Detail movie tanpa proteksi
Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail_movie'])->name('movie.detail');


});
