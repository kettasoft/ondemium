<?php

namespace Modules\User\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfHasCapabilitiesToRequest
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
        $route = $request->route();
        $controller = $route->getActionName();

        [$controller, $method] = explode('@', $route->getActionName());

        $controller = strtolower(explode('\\', $controller)[1]);

        dd($route->getMissing());
        
        if (auth()->user()->abilities("$controller.$method")) {
            return $next($request);
        }
    }
}
