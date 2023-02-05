<?php

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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