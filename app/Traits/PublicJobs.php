<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait PublicJobs
{
	public function logout(Request $request)
	{
		$user = $request->user();

		$user->currentAccessToken()->delete();

		return response()->json([
			'success' => true,
			'message' => 'logout successfully.'
		]);
	}
}