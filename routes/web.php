<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\FieldImagesController;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SchedulesController;
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

// Rent routes
Route::get('/rent', [RentController::class, 'index'])->name('rent.index');
Route::middleware('auth')->group(function () {
    Route::get('/rent/{field}', [RentController::class, 'show'])->name('rent.field');
    Route::post('/rent/{field}', [RentController::class, 'storeBooking'])->name('rent.book');
    Route::get('/rent/{field}/details/{payment}', [RentController::class, 'details'])->name('rent.details');
});

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
    Route::get('/field-images/{fieldImage}', [FieldImagesController::class, 'show'])->name('field-images.show');
    Route::get('/field-images/{fieldImage}/edit', [FieldImagesController::class, 'edit'])->name('field-images.edit');
    Route::put('/field-images/{fieldImage}', [FieldImagesController::class, 'update'])->name('field-images.update');
    Route::delete('/field-images/{fieldImage}', [FieldImagesController::class, 'destroy'])->name('field-images.destroy');

    // Booking Routes
    Route::get('/bookings', [BookingsController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingsController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}/edit', [BookingsController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{booking}', [BookingsController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingsController::class, 'destroy'])->name('bookings.destroy');

    //Schedule Routes
    Route::get('/schedules', [SchedulesController::class, 'index'])->name('schedules.index');
    Route::get('/schedules/create', [SchedulesController::class, 'create'])->name('schedules.create');
    Route::post('/schedules', [SchedulesController::class, 'store'])->name('schedules.store');
    Route::get('/schedules/{schedule}', [SchedulesController::class, 'show'])->name('schedules.show');
    Route::get('/schedules/{schedule}/edit', [SchedulesController::class, 'edit'])->name('schedules.edit');
    Route::put('/schedules/{schedule}', [SchedulesController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules/{schedule}', [SchedulesController::class, 'destroy'])->name('schedules.destroy');

    // Payment Routes
    Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');
    Route::get('/payments/{payment}', [PaymentsController::class, 'show'])->name('payments.show');
    Route::get('/payments/{payment}/edit', [PaymentsController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentsController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentsController::class, 'destroy'])->name('payments.destroy');

    // User Routes (admin)
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});
