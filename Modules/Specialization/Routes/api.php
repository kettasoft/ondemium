<?php

use Illuminate\Http\Request;

Route::controller(SpecializationController::class)->group(function () {
    Route::prefix('specialization')->group(function () {
        Route::middleware(['auth:sanctum', /*'admin'*/])->group(function () {
            Route::post('add', 'addSpecializationToWebsite');
            Route::post('{slug}/remove', 'removeSpecializationFromWebsite');
            Route::post('{specialization}/update', 'updateSpecialization');
        });
        Route::group(['prefix' => 'doctor', 'middleware' => ['auth:sanctum', 'doctor', 'password']], function () {
            Route::post('attach', 'attachSpecializationsToDoctor');
            Route::post('{doctor}/{specializations}/detach', 'detachSpecializationFromDoctor')->scopeBindings();
        });
        Route::get('doctor/{doctor}', 'allSpecialtiesAttachedToDoctor');
        Route::get('all', 'allSpecializations');
        Route::get('{specialization}', 'getDoctorsAttachedToSpecialization');
    });
});