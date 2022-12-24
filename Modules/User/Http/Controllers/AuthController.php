<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Renderable;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->except(['remember']), $request->remember)) {
            $user = $request->user();

            $success['token'] = $user->createToken(env('APP_NAME'))->planTextToken;
            $success['user'] = $user->first_name . ' ' . $user->last_name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User successfully logged in',
            ];

            return response()->json($response);
        } else {
            return response()->json(['message' => 'User is not exists'], 400);
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']); // Hashes the password
        $data['photo'] = json_encode([
            'default' => Str::lower($data['first_name'][0]) . '.' . env('AVATAR_EXTENSION', 'png')
        ]);
        $data['username'] = Str::lower($data['first_name']) . rand(0, 1000000000);

        dd($data);
    }

    public function logout()
    {
        return 'logout';
    }
}
