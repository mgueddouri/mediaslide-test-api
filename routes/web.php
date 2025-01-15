<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;

Route::apiResource('models', ModelController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('bookings', BookingController::class);
