<?php

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'reports', 'controller' => 'ReportController'], function () {
    Route::post('/send', 'create');

    Route::middleware(['admin'])->group(function () {

    });
});