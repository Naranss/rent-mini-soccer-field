<?php

use App\Http\Controllers\SchedulesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}
);
Route::post('/schedules/{id}/book', [SchedulesController::class, 'book'])->name('schedules.book');
