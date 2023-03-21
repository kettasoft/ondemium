<?php

Route::group(['prefix' => 'articles', 'controller' => 'ArticleController'], function () {
    Route::middleware(['auth:sanctum', 'doctor', 'active'])->group(function () {
        Route::post('create', 'create');
        Route::post('{account}/{article}/update', 'update');
        Route::post('{account}/{article}/delete', 'delete');
    });
    Route::get('{article}/show', 'show');
    Route::get('{article}/all', 'get');
});