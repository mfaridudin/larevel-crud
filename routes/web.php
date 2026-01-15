<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswasController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\SendEmailsController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\SiswaHobbiesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordResetLinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::resource('siswa', SiswaController::class)->middleware('auth');

// login google
Route::get('/auth-google-redirect', [GoogleAuthController::class, 'google_redirect']);
Route::get('/auth-google-callback', [GoogleAuthController::class, 'google_callback']);

Route::get('/hobbies', [HobbiesController::class, 'index'])->middleware('auth');
Route::get('/hobbies/create', [HobbiesController::class, 'create'])->middleware('auth');
Route::post('/hobbies/create', [HobbiesController::class, 'store'])->middleware('auth');
Route::get('/hobbies/{id}/edit', [HobbiesController::class, 'edit'])->middleware('auth');
Route::put('/hobbies/{id}/edit', [HobbiesController::class, 'update'])->middleware('auth');
Route::delete('/hobbies/{id}/destroy', [HobbiesController::class, 'destroy'])->middleware('auth');

Route::resource('siswas', SiswasController::class)->middleware('auth');

Route::resource('siswa-hobi', SiswaHobbiesController::class)->middleware('auth');

// polymorph
Route::resource('videos', VideosController::class);

Route::post('/videos/{id}/comment', [CommentController::class, 'storeVideo']);
Route::post('/posts/{id}/comment', [CommentController::class, 'storePost']);
Route::resource('posts', PostsController::class);

// mail
Route::get('send-mail', [SendEmailsController::class, 'index']);
