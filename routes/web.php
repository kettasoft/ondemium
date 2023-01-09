<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

use Modules\Doctor\Models\Doctor;

Route::group(['middleware' => 'Permission','permissions' => ['post.create']], function () {
	Route::get('test', function () {
		// $doctor = \Modules\Doctor\Models\Doctor::with(['posts'])->get();
		// $doctor = Doctor::with(['posts']);
		// $post = \Modules\Post\Models\Post::first();
		// dd($doctor->posts()->create(['body' => 'content']));

		// dd(Doctor::hasPermission('account.username.update'));
		// $doctor = Doctor::whereId(1)->first();
		// dd($doctor->device()->create());
		dump(Doctor::hasPermission(1, 'clinic.create'));
	});
});

Route::get('{path}', AppController::class)->where('path', '^(?!api*).*$');

// {"account":[],"education":{"update":true},"group":{"create":true,"delete":true,"update":true,"activities":true},"clinic":{"create":true,"update":true,"delete":true},"post":{"create":true,"update":true,"delete":true,"comment":true},"activities":{"follow":true,"like":true}}