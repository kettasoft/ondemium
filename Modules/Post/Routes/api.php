<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts', 'all');
Route::get('user/{user}/posts', 'get');

Route::group(['middleware' => ['auth:sanctum', 'active'], 'prefix' => 'posts'], function() {
	Route::post('create', 'create');//->middleware('throttle:5,60');

	Route::scopeBindings()->group(function () {
		Route::post('{user}/{post}/update', 'update');
		Route::delete('{user}/{post}/delete', 'delete');
	});
});
