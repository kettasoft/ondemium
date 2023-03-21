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
        if (is_null(auth()->user())) return abort(UNAUTHORIZED);

        $rule = auth()->user()->rules->first();

        if ($rule && $rule->slug == 'admin') {
            return $next($request);
        }

        return abort(UNAUTHORIZED);
    }
}
