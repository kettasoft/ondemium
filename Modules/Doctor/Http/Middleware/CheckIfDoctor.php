<?php

namespace Modules\Doctor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->tokenCan('doctor')) {
            return $next($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized process'
        ], 401);
    }
}