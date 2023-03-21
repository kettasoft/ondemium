<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Booking\Http\Controllers\BookingController;

Route::get('test', function () {
	Route::middleware('auth:sanctum')->group(function () {
		dd(auth()->user());
	});
	dd(request()->header('User-Agent'));
});

Route::controller(BookingController::class)->group(function () {
	Route::prefix('{doctor}')->group(function () {
	    Route::get('make', 'make');

	    Route::get('count', 'totalCountOfBookings');
	});
});
