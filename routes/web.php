<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\AddMovieController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/test', function(){
    phpinfo();
});


Route::get('/openrouter', [OpenRouterController::class, 'chat']);
Route::get('/movie/admin/create', [AddMovieController::class, 'create'])->name('admin.create');
Route::post('movie/admin/store', [AddMovieController::class, 'store'])->name('admin.store');
