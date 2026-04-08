<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController4;


Route::get('/openrouter', [OpenRouterController::class, 'chat']);

Route::get('/', [MovieController4::class, 'index']);

Route::get('/theloai/{id}', [MovieController4::class, 'genre']);

Route::post('/timkiem', [MovieController4::class, 'search'])->name('search');

Route::get('/phim/{id}', [MovieController4::class, 'show']);