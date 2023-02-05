<?php

namespace Modules\User\Http\Middleware;

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
        if (is_null($request->user())) {
            return alert('unauthorized', false, 400);
        }

        if ($request->user()->rules->first()->slug === 'doctor') {
            return $next($request);
        }

        return alert('forbidden', false, '403');
    }
}
