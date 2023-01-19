<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

// Access path to a post for a specific (user or doctor)

Route::get('{created_id}/posts/{post_id?}', [PostController::class, 'show']);

Route::group(['middleware' => 'auth:sanctum'], function() {
	Route::prefix('post')->group(function() {
		Route::post('create', [PostController::class, 'create']);
		Route::post('{id}/update', [PostController::class, 'update']);
		Route::post('{id}/delete', [PostController::class, 'delete']);
	});
	Route::get('/my-posts', [PostController::class, 'my']);
});
