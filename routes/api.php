<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Doctor\Http\Controllers\DoctorController;

Route::middleware('auth:sanctum')->group(function () {
	Route::post('logout', function (Request $request) {
		// $request->user()->currentAccessToken()->delete();
		
		dd($request->user()->currentAccessToken());
	});
});

Route::middleware('auth:sanctum')->group(function () {
	Route::get('test', function (Request $request) {
		$doctor = $request->user();
		dd($doctor->tokenCan('guard:doctor'));
	});
});
