<?php

namespace Modules\Doctor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionAccess
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
        // $action = request()->route()->getAction()['permissions'];
        // $permissions = require_once(app_path('permissions.php'));
        // if (\Arr::get($permissions, $action)) {

        // }
        return $next($request);
    }
}
