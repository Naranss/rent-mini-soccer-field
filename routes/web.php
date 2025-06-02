<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
})->name('index');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/location', function () {
    return view('pages.location');
})->name('location');

Route::get('/rent', function () {
    return view('pages.rent');
})->name('rent');

Route::get('/rent/form', function () {
    return view('pages.rentform');
})->name('rentform');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
