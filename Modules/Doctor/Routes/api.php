<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Doctor\Http\Controllers\AuthController;
use Modules\Doctor\Http\Controllers\DoctorController;
use Modules\Doctor\Http\Controllers\UpdateController;
use Modules\Doctor\Http\Controllers\VerificationController;

Route::get('/search', [DoctorController::class, 'search']);

Route::middleware('guest')->group(function () {
    Route::post('verify', function () {});
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/current', [DoctorController::class, 'current']);

    Route::prefix('/update')->group(function () {
        Route::put('/username', [UpdateController::class, 'username']);
    });
});

// Login logic
Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['prefix' => 'verify', 'privileges' => ['']], function () {
    Route::post('/email', [VerificationController::class, 'email']);
});