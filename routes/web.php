<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController4;


Route::get('/openrouter', [OpenRouterController::class, 'chat']);

Route::get('/', [MovieController4::class, 'index']);

Route::match(['GET', 'POST'], '/timkiem', [MovieController4::class, 'search']);