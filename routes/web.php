<?php

use Illuminate\Support\Facades\Route;

Route::get('{path}', App\Http\Controllers\AppController::class)->where('path', '(.*)');
