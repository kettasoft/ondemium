<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfHasRules
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rules)
    {
        [$key, $privilege] = explode('.', $rules);

        $privileges = explode('|', $privilege);

        $user = auth()->user()->rules->first();

        // if (!$user->permissions) abort(401);
        dd(explode('@', $request->route()->getAction('controller'), 2)[1]);
        if (\Arr::get($key, '')) {

        }

        return $next($request);
    }
}
