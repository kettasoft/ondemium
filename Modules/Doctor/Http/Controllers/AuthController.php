<?php

namespace Modules\Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Modules\Doctor\Http\Requests\LoginRequest;
use Modules\Doctor\Http\Requests\RegisterRequest;
use Modules\Doctor\Http\Requests\UpdateRequest;
use Modules\Doctor\Models\Doctor;

class AuthController extends Controller
{
    public function signup(RegisterRequest $request)
    {
        $data = $request->all();

        $doctor = Doctor::create($request->except('useragent'));
        $useragent = request()->header('User-Agent');

        event(new \Modules\Doctor\Events\Registered($doctor, $useragent));

        $success['token'] = $doctor->createToken($data['username'], ['doctor'])->plainTextToken;

        return response()->json(['success' => true, 'data' => $success]);
    }

    public function login(LoginRequest $request)
    {
        $diverse = $request['diverse'];
        $case = (string) 'username';

        if (filter_var($diverse, FILTER_VALIDATE_EMAIL)) {
            $case = 'email';
        }

        if (is_numeric($diverse)) {
            $case = 'phone';
        }

        $attempt = ([$case => $request['diverse'], 'password' => $request['password']]);

        if (Auth::guard('doctor')->attempt($attempt)) {

            $doctor = $request->user('doctor');

            foreach($doctor->device as $device) {
                if ($device->ip_address == $request->ip()) {
                    $token = ['token' => create_personal_access_token($doctor, $doctor->username, ['doctor'])];
                    return response()->json(['success' => true, 'data' => $token]);
                }
            }
            
            event(new \Modules\Doctor\Events\UnknownDeviceAttemptedAccessAccount($doctor));

        } else {
            $response = [
                'success' => false,
                'data' => ['error' => 'Invalid credentials'],
            ];

            return response()->json($response);
        }
    }
}
