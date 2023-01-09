<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

Route::prefix('user')->group(function() {
	Route::get('{user_id}/show/{doctor_id}', [PostController::class, 'show']);
});

// api/posts/all
Route::get('all', [PostController::class, 'index']);
Route::get('get/{id}', [PostController::class, 'get']);

Route::group(['prefix' => 'doctor'], function () {
	// api/posts/doctor/all
    Route::get('all', [PostController::class, 'all']);
});

// api/posts/doctor/42154651213