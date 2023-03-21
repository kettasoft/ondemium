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
        $slug = $request->user()->rules->first()->slug;
        if (is_null($request->user())) {
            abort(400);
        }
        if (!$request->user()->rules->first()) {
            abort(401);
        }
        
        if ($slug === 'doctor' || $slug === 'admin') {
            return $next($request);
        }

        return alert('forbidden', false, 403);
    }
}
