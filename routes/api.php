<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HobbiesController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\PasswordResetLinkController;
// use App\Http\Controllers\Api\HobbiesController;
use App\Http\Controllers\Api\SiswaNisnController;
use App\Http\Controllers\Api\SiswaPhoneNumberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login-api');

Route::apiResource('hobby', HobbiesController::class);

Route::apiResource('siswa-nisn', SiswaNisnController::class);

Route::apiResource('siswa-phone-numbe   r', SiswaPhoneNumberController::class);

Route::post('/forgot-password', [PasswordResetLinkController::class, 'forgotPassword']);
Route::post('/reset-password', [NewPasswordController::class, 'reset']);
