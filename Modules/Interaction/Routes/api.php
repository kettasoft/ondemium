<?php

use Illuminate\Http\Request;

Route::controller('InteractionController')->group(function () {
    Route::prefix('interaction')->group(function () {
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('{type}/{id}/{interaction}', 'interaction')->where('type', 'post|blog')->where('interaction', '1|2|3|4|5');
            Route::get('{type}/{id}', 'isInteraction')->where('type', 'post|blog');
        });
        Route::get('{type}/{id}/interventors', 'interventors')->where('type', 'post|blog');
    });
});