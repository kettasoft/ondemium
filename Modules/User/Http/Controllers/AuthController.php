<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Models\User;
use Modules\Rule\Models\Rule;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['phone', 'password']))) {
            $user = $request->user();

            $success['token'] = $user->createToken(env('APP_NAME'))->plainTextToken;
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

    public function signup(RegisterRequest $request, string $type)
    {
        $data = $request->all();
        $data['photo'] = 'url';

        if ($type != 'doctor') $type = 'user';

        $rule = Rule::whereSlug($type)->first();

        $user = User::create($data);

        $user->rules()->attach($rule);

        $token = $user->createToken($data['first_name'])->plainTextToken;

        $success['name'] = $data['first_name'] . ' ' . $data['last_name'];
        $success['token'] = $token;

        return response()->json([
            'success' => true,
            'data' => $success,
            'message' => 'Register successfully'
        ]);
    }
}
