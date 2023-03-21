<?php

use Illuminate\Http\Request;
use Modules\Comment\Http\Controllers\CommentController;

Route::group(['prefix' => 'post', 'middleware' => 'auth:sanctum'], function () {
	Route::controller('CommentController')->group(function () {
		Route::post('{post}/comment/make', 'make');
		Route::scopeBindings()->group(function () {
			Route::post('{post}/comment/{comment}/update', 'update');
			Route::delete('{post}/comment/{comment}/delete', 'delete');
		});
	});
});