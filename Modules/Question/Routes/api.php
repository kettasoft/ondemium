<?php

use Illuminate\Http\Request;

Route::prefix('questions')->group(function () {
    Route::controller(QuestionController::class)->group(function() {
        Route::get('all', 'all');
    
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('make', 'make')->middleware('throttle:5,60');
            Route::prefix('{question}')->group(function () {
                Route::post('update', 'update');
                Route::delete('delete', 'delete');
                Route::get('show', 'show');
            });
        });
    });

    Route::controller(AnswerController::class)->group(function() {
        Route::middleware(['auth:sanctum', 'doctor', 'active'])->group(function() {
            Route::post('{question}/answer', 'make');
            Route::scopeBindings()->group(function() {
                Route::post('{question}/answer/{answer}/delete', 'delete');
                Route::post('{question}/answer/{answer}/approved', 'approved');
            });
        });
    });
});
