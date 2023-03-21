<?php

use Illuminate\Support\Facades\Route;
use Modules\Clinic\Http\Controllers\ClinicController;

Route::get('all', 'all');
Route::get('account/{doctor}/c/{clinic}/get', 'get')->scopeBindings();
Route::get('{doctor}/show', 'show');

Route::middleware(['auth:sanctum', 'doctor', 'active'])->group(function() {
    Route::post('/create', 'create');

    Route::scopeBindings()->group(function () {
        Route::post('account/{doctor}/c/{clinic}/update', 'update');
        Route::delete('account/{doctor}/c/{clinic}/delete', 'delete');
    });
});

Route::group(['middleware' => ['auth:sanctum', 'doctor'], 'prefix' => 'admin'], function () {
    Route::post('{clinic}/set-status/{status}', 'setStatus')->where('status', 'ban|active');
    Route::get('unactive', 'allUnactiveClinics');
});