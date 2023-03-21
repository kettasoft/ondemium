<?php

Route::group(['prefix' => 'pharmacies', 'controller' => 'PharmacyController'], function () {
    Route::middleware(['auth:sanctum', 'doctor', 'active'])->group(function () {
        Route::post('create', 'create');
        Route::post('{pharmacy}/update', 'update');
        Route::post('{pharmacy}/delete', 'delete');
    });
    Route::get('{pharmacy}/show', 'show');
});