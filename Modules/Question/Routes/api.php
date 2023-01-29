<?php

use Illuminate\Http\Request;
use Modules\Question\Http\Controllers\AnswerController;

Route::prefix('question')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('make', 'make');
        Route::get('all', 'all');
        Route::prefix('{question_id}')->group(function () {
            Route::post('update', 'update');
            Route::delete('delete', 'delete');
            Route::get('show', 'show');
            Route::prefix('answer')->group(function () {
                Route::post('make', [AnswerController::class, 'make']);
                Route::put('{id}/update', [AnswerController::class, 'update']);
                Route::delete('{id}/delete', [AnswerController::class, 'delete']);
            });
        });
    });
});