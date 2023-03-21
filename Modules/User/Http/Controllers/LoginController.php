<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Requests\LoginRequest;
use Modules\Device\Models\VerifyDevice;

class LoginController extends Controller
{

    private const CREDENTIALS = ['phone', 'email', 'password'];
    private const SUCCESS_MESSAGE = 'User successfully logged in';
    private const FAIL_MESSAGE = '';

    public function __invoke(LoginRequest $request)
    {
        if ($this->attempt($request)) {
            $user = $request->user();

            // Get the current device
            $device = $user->devices()->whereIp($request->ip())->first();

            if (is_null($device)) $device = $user->devices()->create([
                'ip' => $request->ip(),
                'agent' => $request->header('User-Agent'),
                'status' => 0
            ]);

            if (!$device->verified_at) {
                return alert("Please confirm your device through the sender's code to email: " . mask_email($user->email), false, 400);
            }

            $token = $user->createToken('primary', null)->plainTextToken;

            return response()->json(['token' => $token], 201);
        }

        return response()->json(['message' => 'Email or password is incorrect'], 400);
    }

    private function attempt(LoginRequest $request)
    {
        return Auth::attempt($request->only(self::CREDENTIALS));
    }
}
