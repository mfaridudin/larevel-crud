<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SendEmailsController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaHobbiesController;
use App\Http\Controllers\SiswasController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::resource('siswa', SiswaController::class);
    Route::resource('siswas', SiswasController::class);
    Route::resource('siswa-hobi', SiswaHobbiesController::class);

    Route::get('/hobbies', [HobbiesController::class, 'index']);
    Route::get('/hobbies/create', [HobbiesController::class, 'create']);
    Route::post('/hobbies/create', [HobbiesController::class, 'store']);
    Route::get('/hobbies/{id}/edit', [HobbiesController::class, 'edit']);
    Route::put('/hobbies/{id}/edit', [HobbiesController::class, 'update']);
    Route::delete('/hobbies/{id}/destroy', [HobbiesController::class, 'destroy']);
});

Route::get('/auth-google-redirect', [GoogleAuthController::class, 'google_redirect']);
Route::get('/google/redirect', [GoogleAuthController::class, 'google_redirect']);
Route::get('/auth-google-callback', [GoogleAuthController::class, 'google_callback']);

Route::resource('videos', VideosController::class);
Route::resource('posts', PostsController::class);

Route::post('/videos/{id}/comment', [CommentController::class, 'storeVideo']);
Route::post('/posts/{id}/comment', [CommentController::class, 'storePost']);

Route::get('send-mail', [SendEmailsController::class, 'index']);
