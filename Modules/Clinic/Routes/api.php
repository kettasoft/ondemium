<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Modules\Clinic\Http\Controllers\ClinicController;

Route::get('/{username}', [ClinicController::class, 'get']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/create', [ClinicController::class, 'create']);
    Route::put('/update', [ClinicController::class, 'update']);
});
