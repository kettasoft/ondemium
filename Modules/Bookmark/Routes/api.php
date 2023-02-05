<?php

use Illuminate\Http\Request;

Route::controller(BookmarkController::class)->group(function () {
    Route::group(['prefix' => 'bookmark', 'middleware' => ['auth:sanctum']], function () {
        Route::post('{type}/{id}/save', 'save')->where('type', 'post|doctor|clinic|blog');
        Route::post('{type}/{id}/remove', 'remove')->where('type', 'post|doctor|clinic|blog');
        Route::get('{type}/get', 'get')->where('type', 'post|doctor|clinic|blog');
        // Route::get('{type}/{id}/remove', 'remove')->where('type', 'post|doctor|clinic|blog');
    });
});