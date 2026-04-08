<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\AddMovieController;
use App\Http\Controllers\MovieController4;
use App\Http\Controllers\MovieControllerNhien;


Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

Route::get('/movie/list', [App\Http\Controllers\ManagementController::class, 'movie_list']);
Route::post('/movie/delete/{id}', [App\Http\Controllers\ManagementController::class, 'movie_delete']);
=======
Route::get('/', [MovieController4::class, 'index']);

Route::get('/test', function () {
    phpinfo();
});


Route::get('/openrouter', [OpenRouterController::class, 'chat']);

Route::get('/movie/admin/create', [AddMovieController::class, 'create'])->name('admin.create');
Route::post('/movie/admin/store', [AddMovieController::class, 'store'])->name('admin.store');

Route::match(['GET', 'POST'], '/timkiem', [MovieController4::class, 'search']);

Route::get('/home', [MovieControllerNhien::class, 'index']);
Route::get('/home/detail/{id}', [MovieControllerNhien::class, 'detail']);