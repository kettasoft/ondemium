<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\UserController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/', [UserController::class, 'get']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
});
