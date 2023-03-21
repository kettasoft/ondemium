<?php

use Illuminate\Http\Request;
use Modules\Setting\Http\Controllers\GeneralSettingController;
use Modules\Setting\Http\Controllers\ClinicSettingController;

Route::prefix('user/{user}')->group(function () {
    Route::group(['prefix' => 'settings', 'middleware' => 'auth:sanctum'], function () {
        Route::get('/', [GeneralSettingController::class, 'get']);
        Route::post('update', [GeneralSettingController::class, 'update']);
    });
});

Route::prefix('clinic/{clinic}')->group(function () {
    Route::group(['prefix' => 'settings', 'middleware' => 'auth:sanctum'], function () {
        Route::get('/', [ClinicSettingController::class, 'get']);
        Route::post('update', [ClinicSettingController::class, 'update']);
    });
});