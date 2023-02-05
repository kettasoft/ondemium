<?php

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfActiveAccount
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
        if (is_null($request->user())) {
            return alert('unauthorized', false, 400);
        }

        if ($request->user()->status === TRUE) {
            return $next($request);
        }

        return alert("Your account is now suspended due to a violtion of {".env('APP_NAME')."}", false, '401');
    }
}
