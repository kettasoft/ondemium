<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    private const CREDENTIALS = ['phone', 'email', 'password'];
    private const SUCCESS_MESSAGE = 'User successfully logged in';
    private const FAIL_MESSAGE = '';


    public function __invoke(LoginRequest $request)
    {
        if ($this->attempt($request)) {
            $user = $request->user();

            $success['token'] = $user->createToken($user->username)->plainTextToken;

            $response = response()->json([
                'success' => true,
                'data' => $success,
                'message' => self::SUCCESS_MESSAGE,
            ]);

            return $response;
        }

        return response()->json(['message' => 'User is not exists'], 400);
    }

    private function attempt(LoginRequest $request)
    {
        return Auth::attempt($request->only(self::CREDENTIALS));
    }
}
