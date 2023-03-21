<?php

use Illuminate\Support\Facades\Route;
use Modules\Device\Events\FlushExpiredCodeDeviceVerify;
use Modules\Pharmacy\Models\Pharmacy;
use Modules\User\Models\User;
use Modules\User\Events\Registered;

Route::get('test', function () {

    dd(cache());

});

Route::get('/', \App\Http\Controllers\AppController::class);
