<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\FieldImagesController;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/location', function () {
    return view('pages.location');
})->name('location');

Route::get('/rent', function () {
    return view('pages.rent');
})->name('rent');

Route::get('/rent/book', function () {
    return view('pages.rentfieldbook');
})->name('rentfieldbook');

Route::get('/rent/form', function () {
    return view('pages.rentform');
})->name('rentform');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login-auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    // Field Routes
    Route::get('/fields', [FieldsController::class, 'index'])->name('fields.index');
    Route::get('/fields/create', [FieldsController::class, 'create'])->name('fields.create');
    Route::post('/fields', [FieldsController::class, 'store'])->name('fields.store');
    Route::get('/fields/{field}', [FieldsController::class, 'show'])->name('fields.show');
    Route::get('/fields/{field}/edit', [FieldsController::class, 'edit'])->name('fields.edit');
    Route::put('/fields/{field}', [FieldsController::class, 'update'])->name('fields.update');
    Route::delete('/fields/{field}', [FieldsController::class, 'destroy'])->name('fields.destroy');

    // Field Image Routes
    Route::get('/field-images', [FieldImagesController::class, 'index'])->name('field-images.index');
    Route::get('/field-images/create', [FieldImagesController::class, 'create'])->name('field-images.create');
    Route::post('/field-images', [FieldImagesController::class, 'store'])->name('field-images.store');

    // Booking Routes
    Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings.index');

    // Payment Routes
    Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');

    // User Routes (admin)
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
});
