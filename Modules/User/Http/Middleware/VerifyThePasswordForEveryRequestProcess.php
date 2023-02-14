<?php

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyThePasswordForEveryRequestProcess
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
        if (is_null(auth()->user())) return alert('unauthorized', false, 401);
        if (! $request->get('password')) return alert('Password is required', false, 400);
        
        if (\Hash::check($request->password, auth()->user()->password)) {
            return $next($request);
        }

        return alert('The password is incorrect!', false, 400);

    }
}
