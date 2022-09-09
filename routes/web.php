<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return redirect('/bookings');
});

Route::get('/bookings', [BookingController::class, 'index']);

Route::get('/bookings/new', [BookingController::class, 'create']);

Route::post('/bookings', [BookingController::class, 'store']);

Route::delete('/bookings/delete/{id}', [BookingController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');