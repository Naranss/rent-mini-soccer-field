<?php

use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\Route;

Route::post('/midtrans/notification', [MidtransController::class, 'notification']);
