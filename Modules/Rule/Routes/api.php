<?php

Route::controller('RuleController')->group(function () {
    Route::group(['middleware' => ['auth:sanctum', 'active', 'admin'], 'prefix' => 'rules'], function () {
        Route::post('create', 'create');
        Route::get('{rule}/show', 'show');
        Route::put('{rule}/update', 'update');
        Route::delete('{rule}/delete', 'delete');
    });
});