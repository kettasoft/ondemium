<?php

use Modules\Address\Http\Controllers\AddressController;

Route::group(['prefix' => 'addresses', 'where' => ['model' => AddressController::keys()]], function () {
    Route::get('{model}/{username}/get', [AddressController::class, 'index']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('{model}/{username}/create', [AddressController::class, 'create']);
    });
});