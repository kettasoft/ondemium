<?php

namespace Modules\Device\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RejectRequestIfDeviceIsNotVerified
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
        dd('false');
        return $next($request);
    }
}
