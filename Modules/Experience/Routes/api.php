<?php

use Illuminate\Http\Request;

Route::controller(ExperienceController::class)->group(function () {
    Route::prefix('experience')->group(function () {
        Route::middleware(['auth:sanctum', 'doctor', 'active'])->group(function () {
            Route::post('add', 'add');
            Route::scopeBindings()->group(function () {
                Route::post('{experience}/doctor/{doctor}/update', 'update');
                Route::post('{experience}/doctor/{doctor}/delete', 'delete');
            });
        });
        Route::get('{doctor}/all', 'all');
    });
});