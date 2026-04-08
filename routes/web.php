<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);
Route::get('/home','App\Http\Controllers\MovieControllerNhien@index');
Route::get('home/detail/{id}','App\Http\Controllers\MovieControllerNhien@detail');
