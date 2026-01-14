<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaHobbiesController;
use App\Http\Controllers\SiswasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::resource('siswa', SiswaController::class)->middleware('auth');

Route::get('/hobbies', [HobbiesController::class, 'index'])->middleware('auth');
Route::get('/hobbies/create', [HobbiesController::class, 'create'])->middleware('auth');
Route::post('/hobbies/create', [HobbiesController::class, 'store'])->middleware('auth');
Route::get('/hobbies/{id}/edit', [HobbiesController::class, 'edit'])->middleware('auth');
Route::put('/hobbies/{id}/edit', [HobbiesController::class, 'update'])->middleware('auth');
Route::delete('/hobbies/{id}/destroy', [HobbiesController::class, 'destroy'])->middleware('auth');

Route::resource('siswas', SiswasController::class)->middleware('auth');

Route::resource('siswa-hobi', SiswaHobbiesController::class)->middleware('auth');
