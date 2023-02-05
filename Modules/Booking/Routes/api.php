<?php

use Illuminate\Http\Request;

Route::prefix('booking')->group(function () {

    Route::middleware('auth:sanctum')->group(function () {
        
        Route::scopeBindings()->group(function () {
            Route::post('clinic/{clinic}/doctor/{worker}/make', 'make'); // Make booking
            Route::post('clinic/{clinic}/doctor/{worker}/cancel', 'cancel'); // Cancel Booking
            Route::post('clinic/{clinic}/doctor/{worker}/update', 'update'); // Update Booking
        });

        Route::group(['prefix' => 'doctor', 'middleware' => 'doctor'], function () {
            Route::get('total', 'totalBookingsMade');
        });
    });
    Route::group(['prefix' => 'doctor'], function () {
        Route::get('{doctor}/count', 'completedBookingsCount');
    });
});


// api/1231/booking/make