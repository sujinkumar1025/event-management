<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;


Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events/{id}/book', [BookingController::class, 'store']);


Route::get('/admin/events', [AdminController::class, 'events']);
Route::post('/admin/events', [AdminController::class, 'storeEvent']);
Route::get('/admin/events/{id}/bookings', [AdminController::class, 'bookings']);
Route::delete('/admin/bookings/{id}', [AdminController::class, 'deleteBooking']);
