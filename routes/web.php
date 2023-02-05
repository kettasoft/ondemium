<?php

use Illuminate\Support\Facades\Route;
use Modules\Doctor\Models\Doctor;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;

// 'SELECT * FROM doctors JOIN followers ON followers.doctor_id = doctors.id'

Route::get('/', function () {
});
