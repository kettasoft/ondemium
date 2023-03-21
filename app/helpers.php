<?php

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

if (!function_exists('permission')) {
	function permission($permissions, $pattern = null)
	{
		if (!is_null($permissions) || !$permissions === '{}') {

			$permissions = is_string($permissions) ? json_decode($permissions, true): $permissions;

			if (is_array($permissions)) {
				return (bool) \Arr::get($permissions, $pattern);
			}
		}
		return false;
	}
}

if (!function_exists('create_personal_access_token')) {
	function create_personal_access_token($instance, $name, $abilities = [])
	{
		return $instance->createToken($name, $abilities)->plainTextToken;
	}
}

if (! function_exists('alert')) {
	/**
	 * Simple way to return a simple message after creation or update
	 * @param $message string
	 * @param $success bool 
	 * @param $status  int
	 * @return \Illuminate\Http\Response
	 */
	function alert($message, $success = true, $status = 200): JsonResponse
	{
		return response()->json([
			'success' => $success,
			'message' => $message,
		], $status);
	}
}

if (!function_exists('mask_email')) {
	/**
	 * Mask email
	 * @param string $email
	 * @param string $character = '*'
	 * @return string
	 */
	function mask_email(string $email, $character = '*'): string
	{
		$freeProviders = ['gmail.com', 'hotmail.com', 'yahoo.com'];

		$exploded = explode('@', $email);
		$name = $exploded[0];
		$start = (strlen($name) < 6) ? \Str::mask($name, $character, 1, strlen($name)) : (\Str::mask($name, $character, $start = 2, strlen($name) - $start - 1));
		$provider = in_array(end($exploded), $freeProviders) ? end($exploded) : \Str::mask(end($exploded), $character, 2, strlen(end($exploded)) - 5 - 2);
		return $start . '@' . $provider;
	}
}

if (! function_exists('avatar_path'))
{
	/**
	 * Mask email
	 * @param string $name = '*'
	 * @return string
	 */
	function avatar_path(string $name)
	{
		$avatarName = \Str::lower($name[0]) . AVATAR_EXTINSION;

		$img = asset('storage/images/avatars') . '/' . $avatarName;
		
		if (Storage::exists('public/images/avatars/' . $avatarName)) {
			return $img;
		}

		return null;
	}
}