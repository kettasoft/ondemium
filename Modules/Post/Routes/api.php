<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

// Access path to a post for a specific (user or doctor)
Route::get('/post', [PostController::class, 'get']);

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'post'], function() {
	Route::post('create', [PostController::class, 'create']);
	Route::post('{id}/update', [PostController::class, 'update']);
	Route::post('{id}/delete', [PostController::class, 'delete']);
});
