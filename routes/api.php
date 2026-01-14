<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HobbiesController;
use App\Http\Controllers\Api\SiswaNisnController;
use App\Http\Controllers\Api\SiswaPhoneNumberController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::apiResource('hobby', HobbiesController::class,);

Route::apiResource('siswa-nisn', SiswaNisnController::class,);

Route::apiResource('siswa-phone-number', SiswaPhoneNumberController::class,);