<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(PostController::class)->group(function () {
	// Access path to a post for a specific (user or doctor)
	Route::get('{created_id}/posts/{post_id?}', 'show');

	Route::get('/posts', 'all');
	Route::middleware('auth:sanctum')->group(function() {
		Route::prefix('post')->group(function() {
			Route::post('create', 'create');
			Route::post('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
		Route::get('/my-posts', 'my');
	});
});
