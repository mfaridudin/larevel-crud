<?php

use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaHobbiesController;
use App\Http\Controllers\SiswasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hobbies', [HobbiesController::class, 'index']);
Route::get('/hobbies/create', [HobbiesController::class, 'create']);
Route::post('/hobbies/create', [HobbiesController::class, 'store']);
Route::get('/hobbies/{id}/edit', [HobbiesController::class, 'edit']);
Route::put('/hobbies/{id}/edit', [HobbiesController::class, 'update']);
Route::delete('/hobbies/{id}/destroy', [HobbiesController::class, 'destroy']);

Route::resource('siswa', SiswaController::class);

Route::resource('siswas', SiswasController::class);

Route::resource('siswa-hobi', SiswaHobbiesController::class);
