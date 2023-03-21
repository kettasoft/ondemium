<?php

namespace Modules\User\Http\Controllers;

use Modules\User\Http\Requests\RegisterRequest;
use Illuminate\Routing\Controller;
use Modules\User\Models\User;
use Modules\Rule\Models\Rule;

class RegisterController extends Controller
{

    private const DEFAULT_USER_GUARD = 'primary';
    private const DEFAULT_PRIFILEGES = null;

    public function __invoke(RegisterRequest $request, string $type = 'user')
    {
        $data = $request->all();
        $data['photo'] = public_path('storage/images/avatars/') . \Str::lower($data['first_name'][0]);

        $user = User::create($data);

        $token = $user->createToken(self::DEFAULT_USER_GUARD, self::DEFAULT_PRIFILEGES)->plainTextToken;

        $response = response()->json([
            'success' => true,
            'data' => ['token' => $token],
            'message' => 'Register successfully'
        ], 201);

        return $response;
    }
}
