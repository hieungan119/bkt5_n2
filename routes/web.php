<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);
use App\Http\Controllers\MovieController;


Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');




Route::get('/', [MovieController::class, 'index']);


Route::get('/', [MovieController::class, 'index']);
Route::get('/theloai/{id}', [MovieController::class, 'getMoviesByGenre']);