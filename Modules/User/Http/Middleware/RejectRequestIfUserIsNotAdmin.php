<?php

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RejectRequestIfUserIsNotAdmin
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

        if (auth()->user()->rules->first()->slug == 'admin') {
            return $next($request);
        }

        return alert('unauthorized', false, 401);
    }
}
