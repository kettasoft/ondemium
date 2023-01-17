<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

use Modules\Doctor\Models\Doctor;
use Modules\Group\Models\Memberable;
use Modules\Group\Models\Group;
use Modules\Doctor\Transformers\DoctorResource;

Route::group(['middleware' => 'Permission','permissions' => ['post.create']], function () {
	Route::get('test', function () {
		$id = 1;
		$members = Memberable::whereHasMorph('memberable', ['*'], function ($query) use ($id) {
            return $query->where('group_id', $id);
        })->paginate(20);

        foreach ($members as $member) {
            $data[] = $member->memberable;
        }

        dump($data);
	});
});

Route::get('{path}', AppController::class)->where('path', '^(?!api*).*$');

// {"account":[],"education":{"update":true},"group":{"create":true,"delete":true,"update":true,"activities":true},"clinic":{"create":true,"update":true,"delete":true},"post":{"create":true,"update":true,"delete":true,"comment":true},"activities":{"follow":true,"like":true}}