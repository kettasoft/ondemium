<?php

Route::group(['prefix' => 'plans', 'middleware' => ['auth:sanctum'], 'controller' => 'PlanController'], function () {
    Route::get('/', 'index');
    Route::post('account/{doctor}/plan/{plan}/pay');
    Route::group(['middleware' => ['rules:plan.create|update|delete']], function () {
        Route::post('create', 'create');
        Route::put('{plan}/update', 'update');
        Route::delete('{plan}/delete', 'delete');
    });
});