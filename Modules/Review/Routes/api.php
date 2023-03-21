<?php

use Illuminate\Http\Request;

Route::controller('ReviewController')->group(function () {
    Route::prefix('review')->group(function () {
        Route::prefix('{key}/{id}')->group(function () {
            Route::middleware('auth:sanctum')->group(function () {
                Route::post('create', 'create'); 
                Route::put('update', 'update'); 
                Route::delete('delete', 'delete'); 
                Route::get('private', 'viewAnyPrivate'); 
            });
            Route::get('all', 'all'); 
        });
    });
});