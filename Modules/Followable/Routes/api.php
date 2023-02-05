<?php

use Illuminate\Http\Request;

Route::controller(FollowableController::class)->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('follow/{user}', 'follow');
        Route::post('unfollow/{user}', 'unfollow');
        Route::get('my-followings');
    });

    Route::get('followers/{user}/{count?}', 'followers')->where('count', 'count');
    Route::get('followings/{user}', 'following');
});
