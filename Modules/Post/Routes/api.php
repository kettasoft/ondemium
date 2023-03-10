<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(PostController::class)->group(function () {
	Route::get('/posts', 'all');
	Route::get('user/{user}/posts', 'get');
	Route::middleware('auth:sanctum')->group(function() {
		Route::prefix('post')->group(function() {
			Route::post('create', 'create');
			Route::post('{id}/update', 'update');
			Route::delete('{id}/delete', 'delete');
		});
		Route::get('/my-posts', 'my');
	});
});
