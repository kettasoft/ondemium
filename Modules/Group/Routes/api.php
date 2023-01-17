<?php

use Illuminate\Http\Request;
use Modules\Group\Http\Controllers\GroupController;

Route::group(['prefix' => 'group'], function () {
    Route::get('feed', [GroupController::class, 'index']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/current', [GroupController::class, 'current']);
        Route::post('/create', [GroupController::class, 'create']);
        Route::put('{id}/update', [GroupController::class, 'update']);
        Route::post('{id}/delete', [GroupController::class, 'delete']);
        Route::get('{id}/members', [GroupController::class, 'members']);
        Route::post('{id}/join', [GroupController::class, 'join']);
        Route::get('membership', [GroupController::class, 'membership']);
    });
    Route::get('{id}', [GroupController::class, 'get']);
});
