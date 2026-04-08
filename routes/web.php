<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

Route::get('/movie/list', [App\Http\Controllers\ManagementController::class, 'movie_list']);
Route::post('/movie/delete/{id}', [App\Http\Controllers\ManagementController::class, 'movie_delete']);

Route::get('/openrouter', [OpenRouterController::class, 'chat']);
