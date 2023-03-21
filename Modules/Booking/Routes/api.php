<?php

Route::prefix('booking')->group(function () {

    Route::middleware('auth:sanctum')->group(function () {
    
        Route::group(['where' => ['model' => 'clinic|hospital']], function () {
            Route::post('{model}/{username}/doctor/{doctor}/make', 'create'); // Make booking
            Route::post('{model}/{username}/cancel', 'delete'); // Cancel Booking
            Route::post('{model}/{username}/doctor/{doctor}/update', 'update'); // Update Booking
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