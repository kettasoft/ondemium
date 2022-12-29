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

        event(new \Modules\Doctor\Events\Registered($doctor, $request->only('useragent')));

        $success['token'] = $doctor->createToken($data['username'])->plainTextToken;

        $response = [
            'success' => true,
            'data' => $success,
        ];

        return response()->json($response);
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

            $token = ['token' => $doctor->createToken($request->diverse)->plainTextToken];

            $response = [
                'success' => true,
                'data' => $token,
            ];

            return response()->json($response);
        } else {
            $response = [
                'success' => false,
                'data' => ['error' => 'Invalid credentials'],
            ];

            return response()->json($response);
        }
    }
}
