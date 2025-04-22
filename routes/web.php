<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/home', function () {
    return view('home');
});
Route::get('/activities', function () {
    return view('activities');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/forum', function () {
    return view('forum');
});
Route::get('/link', function () {
    return view('link');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/sessions', function () {
    return view('sessions');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/login', [AuthController::class, 'login'])->name('login.custom');
Route::post('/register', [AuthController::class, 'register'])->name('register.custom');

use Illuminate\Support\Facades\DB;


