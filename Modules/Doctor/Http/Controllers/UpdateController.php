<?php

namespace Modules\Doctor\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Doctor\Http\Requests\UpdateUsernameRequest;

class UpdateController extends Controller
{
    public function username(UpdateUsernameRequest $request)
    {
        $doctor = $request->user();

        $username = $request->username;

        if ($doctor->update($request->all())) {
            return response()->json([
                'success' => true,
                'message' => 'The Your username has been updated to ' . $username . ' successfully.'
            ]);
        }
    }
}
