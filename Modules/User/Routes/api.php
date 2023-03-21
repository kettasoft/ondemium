<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

Route::group(['prefix' => 'auth'], function () {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('logout', LogoutController::class);
        Route::get('/current', [UserController::class, 'get']);
    });

    Route::post('login', LoginController::class);
    Route::post('{type}/signup', RegisterController::class)->where('type', 'user|doctor');//->middleware('throttle:1,1');
});
