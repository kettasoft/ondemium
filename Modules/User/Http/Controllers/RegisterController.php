<?php

namespace Modules\User\Http\Controllers;

use Modules\User\Http\Requests\RegisterRequest;
use Illuminate\Routing\Controller;
use Modules\User\Models\User;
use Modules\Rule\Models\Rule;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, string $type)
    {
        $data = $request->all();
        $data['photo'] = 'url';

        if ($type != 'doctor') $type = 'user';

        $rule = Rule::whereSlug($type)->first();

        $user = User::create($data);

        $user->rules()->attach($rule);

        $token = $user->createToken($user->username)->plainTextToken;

        $response = response()->json([
            'success' => true,
            'data' => ['token' => $token],
            'message' => 'Register successfully'
        ], 201);

        return $response;
    }
}
