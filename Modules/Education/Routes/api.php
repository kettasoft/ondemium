<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Education\Http\Controllers\EducationController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create', [EducationController::class, 'create']);
    Route::get('/get', [EducationController::class, 'get']);
});
