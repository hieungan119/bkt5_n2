<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController4;
use App\Http\Controllers\MovieControllerNhien;

Route::get('/openrouter', [OpenRouterController::class, 'chat']);

Route::get('/', [MovieController4::class, 'index']);
Route::match(['GET', 'POST'], '/timkiem', [MovieController4::class, 'search']);

Route::get('/home', [MovieControllerNhien::class, 'index']);
Route::get('/home/detail/{id}', [MovieControllerNhien::class, 'detail']);